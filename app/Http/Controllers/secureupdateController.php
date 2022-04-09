<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
//use App\Rules\passcheck;
use App\Rules\pincheck;
use Illuminate\Support\Facades\Hash;
class secureupdateController extends Controller
{
    public function index()
    {
        return view('users.settings');
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function updatepin(Request $request, $id)
    {

        $request->validate([
            'opin'=>['required',new pincheck(),'numeric'],
            'npin'=>['required', 'numeric', 'digits:6']
        ]);
        $pinx = User::find($id)->pluck('pin');
        If($pinx == $request->input('npin'))
        {
            return redirect()->back()->with('error', "Your New Pin Cannot be same as Old Pin");
        }
        User::Where('id', $id)->update(['pin' => $request->input('npin')]);
        return redirect()->back()->with('success', "Account Pin Changed Successfully");
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function updatepass(Request $request, $id)
    {
        //dd($request);
        //new passcheck();
        $request->validate([
            'opass'=>['required'],
            'npass'=>['required','different:opass','min:8']
        ]);

        if (Hash::check($request->input('opass'), auth()->user()->password)){

            User::Where('id', $id)->update(['password' => Hash::make($request->input('npass'))]);

            return redirect()->back()->with('success',"Password Changed Successfully");

        }
        else
        {

            return redirect()->back()->with('error',"You've entered the wrong password");
        }




    }
}