<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class r_account extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
         'account_id',
         'r_name',
         'r_acc_no',
         'bname',
         'swiftcode',
         'remarks',
    ];

    public function r_accounts()
    {
        return $this->belongsTo(account::class);
    }

    public function txns()
    {
        return $this->HasManyThrough(txn::class, account::class, 'user_id', 'account_id');
    }
}

