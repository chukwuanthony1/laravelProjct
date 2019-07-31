<?php

namespace App;
use App\product;
use App\order;


use Illuminate\Database\Eloquent\Model;

class admin extends Model
{

    protected $fillable = [
        'name', 'email', 'password','number', 'address', 'access',
    ];


    public function products()
    {
      return $this->hasMany(product::class);
    }
    public function orders()
    {
      return $this->hasMany(order::class);
    }

}
