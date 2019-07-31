<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
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
              $theuser = User::where('email', $request->email)->first();
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


        $banner = User::create([

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

      public function user(Request $request)
      {


        $user = User::where('id', $request->id)->first();

        return $user;
      }

      public function resetuserpassword(Request $request)
      {


        $user = User::where('email', $request->email)->first();

        if(!$user) {

          return response()->json([
              'message' => 'No user with such email'
          ], 401);
      }

        if($user) {
          $user->password = bcrypt($request->newpassword);
          $user->save();
          return response()->json([
              'message' => 'password reset successful'
          ], 200);
      }


      }

      public function updateusernumber(Request $request)
      {


        $user = User::where('number', $request->number)->first();

        if(!$user) {

          return response()->json([
              'message' => 'No user with such number'
          ], 401);
      }

        if($user) {
          $user->number = $request->newnumber;
          $user->save();
          return response()->json([
              'message' => 'number reset successful'
          ], 200);
      }


      }

      public function updateuseremail(Request $request)
      {


        $user = User::where('email', $request->email)->first();

        if(!$user) {

          return response()->json([
              'message' => 'No user with such email'
          ], 401);
      }

        if($user) {
          $user->email = $request->newemail;
          $user->save();
          return response()->json([
              'message' => 'email reset successful'
          ], 200);
      }


      }
}
