<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\txn;
use App\Models\otp;
use App\Models\account;
use App\Models\User;
use App\Models\r_account;
use App\Rules\enoughbal;
use Illuminate\Support\Facades\Auth;

class txnscontroller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = txn::where('account_id', Auth::user()->accounts[0]['id'])->paginate(4);
        $sum_of_transaction = txn::where('account_id', Auth::user()->accounts[0]['id'])->count();
        $debit_sum = txn::where('txn_flow', 'DEBIT')->sum('txn_amount');
        $credit_sum = txn::where('txn_flow', 'CREDIT')->sum('txn_amount');
        //dd($user);
        return view('users.transfer', ['user' => $user, 'debit_sum' => $debit_sum, 'credit_sum' => $credit_sum, 'sum_of_transaction' => $sum_of_transaction]);
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
        $this->validate($request, [
            'acc_no' => ['required', 'min:10'],
            'r_acc' => ['required', 'min:10'],
            'amt' => ['required', 'between:0,99.99', new enoughbal(), 'min:1'],
            'txn_type' => ['required'],
            'desc' => ['nullable'],
        ]);

        $desc = $request->input('desc');

        if ($desc == Null) {
            $desc = "You have sent $" . $request->input('amt') . " to " . $request->input('r_acc');
        }

        $accx = str_split($request->input('r_acc'), 4);
        $txn_no = 'TXAFCU' . $accx[0] . date('ds');
        $acct = account::Firstwhere('acc_no', $request->input('acc_no'));
        $new_bal = $acct['bal'] - $request->input('amt');

        if ($request->input('txn_type') == "International Transfer") {
            account::where('id', $acct['id'])->update(['bal' => $new_bal]);
            $txn = new txn;
            $txn->account_id = $acct['id'];
            $txn->txn_no = $txn_no;
            $txn->txn_type = $request->input('txn_type');
            $txn->txn_amount = $request->input('amt');
            $txn->txn_status ="Pending";
            $txn->txn_flow = 'DEBIT';
            $txn->txn_desc = $desc;
            $txn->save();
            if($txn){
                $otp = new otp;
                $otp->txns_id = $txn->id;
                $otp->otp = rand(111111,999999);
                $otp->save();
                if ($otp){
                    return redirect()->route('otp.index', ['txn'=>$txn]);
                }
            }

        }

        if ($request->input('txn_type') == "Local Transfer") {
            account::where('id', $acct['id'])->update(['bal' => $new_bal]);
            txn::create([
                'account_id' => $acct['id'],
                'txn_no' => $txn_no,
                'txn_type' => $request->input('txn_type'),
                'txn_amount' => $request->input('amt'),
                'txn_status' => "Complete",
                'txn_flow' => 'DEBIT',
                'txn_desc' => $desc,
            ]);


            // print($rec_bal);

        }
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
        //
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
        //
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
