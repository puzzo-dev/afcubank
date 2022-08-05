<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class kyc extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'id_proof',
        'address_proof',
        'status'
    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
