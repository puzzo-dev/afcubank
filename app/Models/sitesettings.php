<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sitesettings extends Model
{
    use HasFactory;

    protected $fillable = [
    'bankname',
    'bankdesc',
    'bankaddress',
    'bankphone',
    'bankemail',
    'logo',
    'pcolor',
    'scolor',
    'currency',
    ];
}

