<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
         'f_name',
         'l_name',
         'u_name',
         'email',
         'is_admin',
         'addr',
         'dob',
         'govid',
         'phone',
         'password',
         'email_verified_at',
         //  'u_img',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'status',
        'is_admin',
        'u_img',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function accounts()
    {
        return $this->hasMany(account::class);
    }

    public function r_accounts()
    {
        return $this->HasManyThrough(r_account::class, account::class, 'user_id', 'account_id');
    }

    public function txns()
    {
        return $this->HasManyThrough(txn::class, account::class, 'user_id', 'account_id');
    }

    public function notifications()
    {
        return $this->hasMany(notification::class);
    }

    public function kyc()
    {
        return $this->hasOne(kyc::class);
    }
}
