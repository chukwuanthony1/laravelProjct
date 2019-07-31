<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Super extends Model
{
    protected $fillable = [
        'name', 'email', 'password',
    ];
}
