<?php

namespace App;
use App\User;
use App\admin;
use App\product;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{

    protected $fillable = [
        'product_id', 'orderid', 'admin_id', 'user_id'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function admin()
    {
      return $this->belongsTo(admin::class);
    }
    public function product()
    {
      return $this->belongsTo(product::class);
    }
}
