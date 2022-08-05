<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class otp extends Model
{
    use HasFactory;
    protected $fillable = [
        'txn_id',
        'otp',
    ];

    protected $hidden = [
        'otp',
    ];

    public function txns()
    {
        return $this->belongsTo(txn::class);
    }


}
