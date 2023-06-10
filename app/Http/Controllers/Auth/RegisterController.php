<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\account;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * [Description RegisterController]
 */
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware(['auth','verified','is_admin']);
        //$this->middleware(['guest']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'f_name' => ['required'],
                'l_name' => ['required'],
                'u_name' => ['required', 'unique:users', 'max:12'],
                'email' => ['required', 'unique:users'],
                'addr1' => ['required'],
                'addr2' => ['nullable'],
                'city' => ['required'],
                'state' => ['required'],
                'country' => ['required'],
                'zipcode' => ['required'],
                'phone' => ['required', 'max:15'],
                'dob' => ['required'],
                'govid' => ['required', 'unique:users'],
                'password' => ['required', 'confirmed', 'min:6'],
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $address = $data['addr1'] . " " .
            $data['addr2'] . " " .
            $data['city'] . " " .
            $data['state'] . " " .
            $data['zipcode'] . " " .
            $data['country'];
        $user = User::create(
            [
                'f_name' => $data['f_name'],
                'l_name' => $data['l_name'],
                'u_name' => $data['u_name'],
                'email' => $data['email'],
                'pin' => rand(111111, 999999),
                'is_admin' => 0,
                'addr' => $address,
                'dob' => $data['dob'],
                'govid' => $data['govid'],
                'phone' => $data['phone'],
                'password' => Hash::make($data['password']),
            ]
        );
        account::create(
            [
                'user_id' => $user->id,
                'acc_no' => rand(1999999999, 9999999999),
                'acc_type' => 'Foreign Workers Residents Checking',
                'bal' => '0.00',
                'active' => true,
            ]
        );
        return $user;
    }
}