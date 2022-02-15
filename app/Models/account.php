<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class account extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
         'user_id',
         'acc_no',
         'acc_type',
         'bal',
         'pin',
         'active',
    ];

    protected $hidden = [

    ];

    public function r_accounts()
    {
        return $this->hasMany(r_account::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function txn()
    {
        return $this->hasMany(txn::class);
    }
}
