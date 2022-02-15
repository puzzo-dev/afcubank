<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class txn extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
         'account_id',
         'txn_no',
         'txn_type',
         'txn_amount',
         'txn_status',
         'txn_flow',
         'txn_desc',

    ];

    public function accounts()
    {
        return $this->belongsTo(account::class);
    }

    public function r_accounts()
    {
        return $this->HasManyThrough(r_account::class, account::class, 'user_id','account_id');
    }

    public function otps()
    {
        return $this->HasOne(otp::class, 'txn_id');
    }



}
