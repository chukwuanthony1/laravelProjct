<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;

class miscilleniousController extends Controller
{
    
    
    
    public function categoryproducts(category $category)
    {

   return $category->products;

    }
    
    
    
       public function suggestproduct(category $category)
    {

       $thearray = json_decode(json_encode($category->products), true);

      $selectedproduct = array_rand($thearray);

       return $thearray[$selectedproduct];

    }
    
        public function suggestmany(category $category)
    {

    //    $thearray = json_decode(json_encode($category->products), true);

    //   $selectedproduct = array_rand($thearray);

       return $category->products;

    }



}
