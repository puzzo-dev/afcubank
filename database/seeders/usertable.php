<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class usertable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        user::create([
            'f_name'=>'Bank',
            'l_name'=>'Admin',
            'u_name'=>'badmin',
            'email'=>'admin@admin.com',
            'pin'=> rand(111111,999999),
            'is_admin'=>true,
            'addr'=>'28, Freddie Lane, Austria',
            'phone'=>'9987611230',
            'dob'=>'1992/11/17',
            'govid'=>'A56112093',
            'password'=>Hash::make('123')
        ]);
    }
}
