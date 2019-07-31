<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\admin;
use App\category;
use App\order;


class product extends Model
{

    protected $fillable = [
        'productname', 'productprice', 'productid','admin_id','category_id','image'
    ];

    public function admin()
    {
      return $this->belongsTo(admin::class);
    }

    public function category()
    {
      return $this->belongsTo(category::class);
    }

    public function orders()
    {
      return $this->hasMany(order::class);
    }

}
