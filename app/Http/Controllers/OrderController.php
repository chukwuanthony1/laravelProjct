<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use App\User;
use App\Http\Resources\UserOrder;
use App\admin;
use App\Http\Resources\AdminOrder;
use App\Notifications\BookedOrder;
use App\product;

class OrderController extends Controller
{
    public function placeorder(Request $request)
    {

        $request->validate([
            'product_id' => 'required|integer',
            'admin_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        $neworder = order::create([
            'product_id' => $request->product_id,
            'orderid' => str_random(5),
            'admin_id' => $request->admin_id,
            'user_id' => $request->user_id

          ]);

         $theproduct = product::find($request->product_id);
         $user = User::where('id', $request->user_id)->first();
          $user->notify(new BookedOrder($theproduct));

          return response()->json([
            'success' => 'Order booked Successfully'
        ], 201);


    }

    public function getalluserorder(Request $request)
    {

        $request->validate([
            'user_id' => 'required|integer',
        ]);


        $userorder = User::find($request->user_id)->orders;

        //   return response()->json([
        //     'userorders' => $userorder
        // ], 200);\

        UserOrder::withoutWrapping();
        // $allstaff = Staff::all();
        $userorders =  UserOrder::collection($userorder);
        return  $userorders;
    //    return response()->json([
    //         'userorders' => $userorders
    //     ], 200);\


    }


    public function getalladminorder(Request $request)
    {

        $request->validate([
            'admin_id' => 'required|integer',
        ]);


        $adminorder = admin::find($request->admin_id)->orders;

        //   return response()->json([
        //     'userorders' => $adminorder
        // ], 200);\

        AdminOrder::withoutWrapping();
        // $allstaff = Staff::all();
        $adminorder =  AdminOrder::collection($adminorder);
        return $adminorder;


    }


    public function getalladminproducts(Request $request)
    {

        $request->validate([
            'admin_id' => 'required|integer',
        ]);


        $adminorder = admin::find($request->admin_id)->products;

        //   return response()->json([
        //     'userorders' => $adminorder
        // ], 200);\

        // AdminOrder::withoutWrapping();
        // // $allstaff = Staff::all();
        // $adminorder =  AdminOrder::collection($adminorder);
        return $adminorder;



    }



}
