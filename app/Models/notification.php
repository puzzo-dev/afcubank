<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\DatabaseNotification;

class notification extends DatabaseNotification
{
    use HasFactory;

    protected $fillable = [
        ''=>'',
        ''=>'',
        ''=>'',
        ''=>'',
    ];

    public function users()
        {
            return $this->belongsTo(User::class, 'notifiable_id');
        }
}
