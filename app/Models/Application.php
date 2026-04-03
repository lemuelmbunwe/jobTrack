<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $guarded = [];

    protected $casts = [
        'applied_at' => 'datetime'
    ];
}
