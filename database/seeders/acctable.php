<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\account;


class acctable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        account::create([
            'user_id'=>'3',
            'acc_no'=> rand(1999999999,9999999999),
            'acc_type'=>'Foreign Workers Residents Checking',
            'bal'=>'0',
            'active'=>true
        ]);
    }
}
