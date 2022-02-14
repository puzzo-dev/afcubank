<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\r_account;
use Illuminate\Support\Facades\Auth;

class recipientController extends Controller
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
        $user = r_account::where('account_id', Auth::user()->accounts[0]['id'])->paginate(4);
        return view('users.beneficiaries',['user'=>$user]);
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
            'r_name' => ['required','min:3'],
            'r_acc' => ['required','min:9'],
            'bname' => ['required'],
            'scode' => ['required','min:5'],
            'remarks' => ['required','min:3'],
        ]);

        $acc_id = Auth::user()->accounts[0]['id'];

     $save = r_account::create([
         'account_id'=>$acc_id,
         'r_name'=>$request->input('r_name'),
         'r_acc_no'=>$request->input('r_acc'),
         'bname'=>$request->input('bname'),
         'swiftcode'=>$request->input('scode'),
         'remarks'=>$request->input('remarks'),
        ]);

        dd($save);
        // Session::flash('message', 'This is a message!');
        // Session::flash('alert-class', 'alert-danger');

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
