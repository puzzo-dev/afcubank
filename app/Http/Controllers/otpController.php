<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\txn;
use App\Models\otp;
use App\Rules\taxcodeCheck;

class otpController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('txns.index');
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
        $otp = otp::find($id);
        if($otp){
            return view('users.otp',['id'=>$id]);
        }
        return redirect()->back();

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
        //dd($request);
        $this->validate($request,[
            'taxcode'=>['required', new taxcodeCheck(),'max:6'],
        ]);
        $otp = otp::find($id);
        txn::where('id',$otp->txn_id)->update(['txn_status'=>"Completed"]);
        $txninfo = txn::find($otp->txn_id);
        $this->destroy($id);
        return view('users.TransferResult',['txninfo'=>$txninfo]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $otp = otp::find($id)->delete();
        return $otp;
    }
}
