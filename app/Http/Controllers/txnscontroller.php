<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\txn;
use App\Models\otp;
use App\Models\account;
use App\Helpers\General\CollectionHelper;
use App\Models\User;
use App\Models\r_account;
use App\Rules\enoughbal;
use Illuminate\Support\Facades\Auth;

class txnscontroller extends Controller
{
    protected $curr;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
        //$curr = env('CURR_SIGN');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curr = env('CURR_SIGN');
        if(auth()->user()->is_admin==1)
        {
            //dd($curr);

        $txn = txn::all()->sortByDesc('updated_at');
        $txns = CollectionHelper::paginate($txn,10);
        $accounts = account::all()->sortByDesc('created_at');
        $sum_of_transaction = txn::all()->count();
        $debit_sum = txn::where('txn_flow','DEBIT')->sum('txn_amount');
        $credit_sum = txn::where(['txn_flow'=>'CREDIT', 'txn_status'=>'Completed'])->sum('txn_amount');
        return view('admin.transactions',['curr'=>$curr,'accounts'=>$accounts,'txns' => $txns, 'debit_sum' => $debit_sum, 'credit_sum' => $credit_sum,'sum_of_transaction' => $sum_of_transaction]);
        }

        $txn = Auth::user()->accounts[0]->txn->sortByDesc('updated_at');
        $txns = CollectionHelper::paginate($txn,10);
        $sum_of_transaction = txn::where(['txn_status'=>'Completed','account_id'=>Auth::user()->accounts[0]['id']])->count();
        $debit_sum = txn::where(['txn_flow'=>'DEBIT','txn_status'=>'Completed','account_id'=>Auth::user()->accounts[0]['id']])->sum('txn_amount');
        $credit_sum = txn::where(['txn_flow'=>'CREDIT','account_id'=>Auth::user()->accounts[0]['id'],'txn_status'=>'Completed'])->sum('txn_amount');
        return view('users.transfer', ['curr'=>$curr,'txns' => $txns, 'debit_sum' => $debit_sum, 'credit_sum' => $credit_sum, 'sum_of_transaction' => $sum_of_transaction]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        switch ($request->input('txn_type')) {
            case 'International Transfer':
                $otp = $this->intltrf($request);
                return redirect()->route('otp.edit', ['otp'=>$otp]);
                break;
            case 'Local Transfer':
                $txninfo = $this->localtrf($request);
                return view('users.TransferResult',['txninfo'=>$txninfo]);
                break;
            case 'Balance Loading':
                $bl = $this->loadbal($request);
                return redirect()->back()->with('success','Customer Account has been Loaded Successfully Transaction Id:'.$bl);
                break;
            default:
                return redirect()->back()->with('error','Please select Transaction type to proceed');
                break;
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function intltrf(Request $request) {

        $curr = env('CURR_SIGN');
        $this->validate($request, [
            //'acc_no' => ['required', 'min:10'],
            'r_acc' => ['required', 'min:10'],
            'amt' => ['required', 'between:0,99.99', new enoughbal(), 'min:1'],
            'txn_type' => ['required'],
            'desc' => ['nullable'],
        ]);
        //dd($request);
        $desc = $request->input('desc');

        if ($desc == null) {
            $desc = "Transfer for sum of ".$curr.number_format($request->input('amt'),2)." is pending clearance";
        }

        $accx = str_split($request->input('r_acc'), 4);
        $txn_no = 'TXAFCU' . $accx[0] . date('hs');
        $acct = account::Firstwhere('acc_no', $request->input('acc_no'));
        $racc = r_account::FirstWhere('r_acc_no', $request->input('r_acc'));
        $new_bal = $acct['bal'] - $request->input('amt');

        $txn = new txn;
        $txn->account_id = $acct['id'];
        $txn->r_account_id = $racc['id'];
        $txn->txn_no = $txn_no;
        $txn->txn_type = $request->input('txn_type');
        $txn->txn_amount = $request->input('amt');
        $txn->txn_status ="Pending";
        $txn->txn_flow = 'DEBIT';
        $txn->txn_desc = $desc;
        $txn->save();
        account::where('id', $acct['id'])->update(['bal' => $new_bal]);
        if($txn){
            $otp = new otp;
            $otp->txn_id = $txn->id;
            $otp->otp = rand(111111,999999);
            $otp->save();
            $this->credittransfer($txn,$otp);
            //dd($otp);
            if ($otp){
                if(auth()->user()->is_admin !== 1){
                    //auth()->user()->notify($transferdata);
                    sleep(3);
                    return $otp;
                }
                return $otp;
            }
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function localtrf(Request $request) {

        $curr = env('CURR_SIGN');
        $this->validate($request, [
            'acc_no' => ['required', 'min:10'],
            'r_acc' => ['required', 'min:10'],
            'amt' => ['required', 'between:0,99.99', new enoughbal(), 'min:1'],
            'txn_type' => ['required'],
            'desc' => ['nullable'],
        ]);
        //dd($request);
        $desc = $request->input('desc');

        if ($desc == null) {
            $desc = "Transfer for sum of ".$curr.number_format($request->input('amt'),2)." has been sent to ".$request->input('r_acc');
        }

        $accx = str_split($request->input('r_acc'), 4);
        $txn_no = 'TXAFCU' . $accx[0] . date('hs');
        $acct = account::Firstwhere('acc_no', $request->input('acc_no'));
        $racc = r_account::FirstWhere('r_acc_no', $request->input('r_acc'));
        $new_bal = $racc['bal'] - $request->input('amt');

        $txninfo = new txn;
        $txninfo->account_id = $acct['id'];
        $txninfo->r_account_id = $racc['id'];
        $txninfo->txn_no = $txn_no;
        $txninfo->txn_type = $request->input('txn_type');
        $txninfo->txn_amount = $request->input('amt');
        $txninfo->txn_status ="Completed";
        $txninfo->txn_flow = 'DEBIT';
        $txninfo->txn_desc = $desc;
        $txninfo->save();
        account::where('id', $acct['id'])->update(['bal' => $new_bal]);
        if($txninfo){
            sleep(3);
        return $txninfo;
        }
        // print($rec_bal);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function loadbal(Request $request){
        $curr = env('CURR_SIGN');
        $this->validate($request, [
            //'acc_no' => ['required', 'min:10'],
            'r_acc' => ['required', 'min:10'],
            'amt' => ['required', 'between:0,999999999.99', 'min:1'],
            //new enoughbal(),
            'txn_type' => ['required'],
            'desc' => ['nullable'],
        ]);
        //dd($request);
        $desc = $request->input('desc');

        if ($desc == null) {
            $desc = "Your Account have been Credited with the sum of ".$curr.number_format($request->input('amt'),2);
        }

        $accx = str_split($request->input('r_acc'), 4);
        $txn_no = 'TXAFCU' . $accx[0] . date('hs');
        // $acct = account::Firstwhere('acc_no', $request->input('acc_no'));
        $racc = account::FirstWhere('acc_no', $request->input('r_acc'));
        $new_bal = $racc['bal'] + $request->input('amt');
        //dd($new_bal);

        $txninfo = new txn;
        $txninfo->account_id = $racc['id'];
        //$txninfo->r_account_id = $racc['id'];
        $txninfo->txn_no = $txn_no;
        $txninfo->txn_type = 'Credit Transaction';
        $txninfo->txn_amount = $request->input('amt');
        $txninfo->txn_status ="Completed";
        $txninfo->txn_flow = 'CREDIT';
        $txninfo->txn_desc = $desc;
        $txninfo->save();
        account::where('id', $racc['id'])->update(['bal' => $new_bal]);
        if($txninfo){
            sleep(3);
            return $txninfo['txn_no'];
        //return view('users.TransferResult',['txninfo'=>$txninfo]);
        }



    }

    public function credittransfer($txn,$otp){
        //dd($txn,$otp);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $txn = txn::find($id);

        dd($txn);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $txninfo = txn::find($id);
        $otp = $txninfo->otps;
        if($txninfo && $otp)
        {
            if($txninfo->txn_status == "Pending" && $txninfo->txn_type == "International Transfer")
            {
                return redirect()->route('otp.edit', ['otp'=>$otp]);
            }
            return view('users.transferResult', ['txninfo'=>$txninfo]);
        }
        return redirect()->back(); //go back code should be here
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $txn = txn::find($id);
        $acc = $txn->accounts;
        $bal = $txn->txn_amount + $acc->bal;
        if($txn && $acc){
            $txn->update(['txn_status' => "Cancelled"]);
            $acc->update(['bal' => $txn->txn_amount + $acc->bal]);
            return redirect()->back()->with('success','Your Transfer ('.$txn->txn_no.') has been Cancelled Successfully');
            //dd($txn, $acc, $bal);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
