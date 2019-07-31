<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    // 'password' => bcrypt('123456'),
    public function login(Request $request)
    {


        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            // 'remember_me' => 'boolean'
        ]);


        $credentials = request(['email', 'password']);
        // if(!$credentials['verifyemail'] = 2) {
            // $verifyemail = User::where('email', $request->email)->first()->verifyemail;
            $theuser = admin::where('email', $request->email)->first();
            if($theuser->access != 2) {

                return response()->json([
                    'message' => 'you have been banned, please report to admin'
                ], 401);
            }
            if(!$theuser) {

                // return response(['message' => 'User not found']);
                return response()->json([
                    'message' => 'User not found'
                ], 401);
            }




            if (!(Hash::check($request->password, $theuser->password))){

                // return response(['message' => 'Password is not equal']);
                return response()->json([
                    'message' => 'Password is not equal'
                ], 401);
            }


            return response()->json([

                'success' => $theuser
            ]);
    }


    public function signup(Request $request)
      {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'number' =>  'required|string',
            'address' => 'required|string',
            'password' => 'required|string',

            // 'remember_me' => 'boolean'
        ]);


        $banner = admin::create([

            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'address' => $request->address,
            'password' => bcrypt($request->password),
            'access' => 2

          ]);


          return response()->json([
            'success' => 'Successfully created new account!'
        ], 201);
    }


    public function admin(Request $request)
    {


      $user = admin::where('id', $request->id)->first();

      return $user;
    }

    public function resetadminpassword(Request $request)
    {


      $user = admin::where('email', $request->email)->first();

      if(!$user) {

        return response()->json([
            'message' => 'No user with such email'
        ], 401);
    }

      if($user) {
        $user->password =  bcrypt($request->newpassword);
        $user->save();
        return response()->json([
            'message' => 'password reset successful'
        ], 200);
    }


    }

}
