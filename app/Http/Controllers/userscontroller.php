<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\account;
use App\Models\kyc;
use App\Helpers\General\CollectionHelper;
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
        $this->middleware(['auth','verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->is_admin == 1)
        {
            $us = user::all()->sortByDesc('created_at');
            $users = CollectionHelper::paginate($us,20);
            $user =  account::where('active',1)->count();
            $kyc = kyc::where('status',1)->count();
            $kycs = kyc::all()->count();
            $data = ['users'=>$users, 'user'=>$user, 'kyc'=>$kyc, 'kycs'=>$kycs];
            return view('admin.users',['data'=>$data]);
        }
        return view('users.home');
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
        //dd(auth()->user());
        if(auth()->user()->is_admin == 1){
           return view('admin.viewuser')->with('user',$user);
        }
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
            if(auth()->user()->is_admin == 1){
            return view('admin.edituser')->with('user',$user);
            }
        return view('users.settings',['user'=>$user]);
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
        dd($request,$id);
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
