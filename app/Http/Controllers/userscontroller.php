<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userscontroller extends Controller
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
        return view('users.welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'f_name'=>'required',
        //     'l_name'=>'required',
        //     'u_name'=>'required|unique:users|max:12',
        //     'email'=>'required|unique:users',
        //     'addr1'=>'required',
        //     'addr2'=>'nullable',
        //     'city'=>'required',
        //     'state'=>'required',
        //     'country'=>'required',
        //     'zipcode'=>'required',
        //     'phone'=>'required|digits:10',
        //     'dob'=>'required',
        //     'govid'=>'required',
        //     'password'=>'required|confirmed|min:6',
        //     'password_confirmation'=>'required|min:6',
        // ]);
        // $address = $request->input('addr1')." ".
        // $request->input('addr2')." ".
        // $request->input('city')." ".
        // $request->input('state')." ".
        // $request->input('zipcode')." ".
        // $request->input('country');
        // $user = User::create([
        //     'f_name'=>$request->input('f_name'),
        //     'l_name'=> $request->input('l_name'),
        //     'u_name'=> $request->input('u_name'),
        //     'email'=> $request->input('email'),
        //     'u_type'=> 'user',
        //     'addr'=> $address,
        //     'dob'=> $request->input('dob'),
        //     'govid'=> $request->input('govid'),
        //     'phone'=> $request->input('phone'),
        //     'password'=> hash::make($request->input('password')),
        // ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = user::find($id);
        //dd($user);
        return view('users.settings')->with('user',$user);
        //dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = user::find($id);
        if($user)
        {
        return view('users.settings',['id'=>$id]);
        }
        //Go back code should be here
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
