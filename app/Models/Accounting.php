<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Accounting extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $guarded = [];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'inicioSesion' => 'datetime:Y-m-d H:00',
    ];
}
