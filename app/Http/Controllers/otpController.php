<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\txn;
use App\Models\otp;
use App\Rules\taxcodeCheck;
use Illuminate\Support\Facades\Auth;

class otpController extends Controller
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
    public function index(Request $txn)
    {
        $sum_of_transaction = txn::where('account_id', Auth::user()->accounts[0]['id'])->count();
        $debit_sum = txn::where('txn_flow', 'DEBIT')->sum('txn_amount');
        $credit_sum = txn::where('txn_flow', 'CREDIT')->sum('txn_amount');
        $tx = txn::where('id',$txn->txn)->get();
        if($tx[0]['txn_status'] == "Completed")
        {
            return redirect()->route('home');
        }
        return view('users.otp',['txn'=>$txn->txn,'debit_sum' => $debit_sum, 'credit_sum' => $credit_sum, 'sum_of_transaction' => $sum_of_transaction]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $this->validate($request,[
            'taxcode'=>['required', new taxcodeCheck(),'max:6'],
        ]);
        $txn = txn::where('id',$id)->update(['txn_status'=>"Completed"]);
        $txns = txn::find($id)->get();
        $this->destroy($id);
        foreach($txns as $txn);
        return view('users.TransferResult',['txn'=>$txn]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $otp = otp::where('txns_id',$id)->delete();
        return $otp;
    }
}
