<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use App\User;
use App\Super;
use Illuminate\Support\Facades\Hash;

class SupercontrolController extends Controller
{
    public function deleteuser(Request $request)
    {


      $user = User::where('id', $request->id)->first();

      $user->delete();
      return response()->json([
        'message' => 'User deleted successfully'
    ], 200);
    }


    public function deleteadmin(Request $request)
    {


      $user = admin::where('id', $request->id)->first();

       $user->delete();
       return response()->json([
        'message' => 'Admin deleted successfully'
    ], 200);
    }

    public function disableadmin(Request $request)
    {


      $user = admin::where('id', $request->id)->first();

      $user->access = $request->access;
      $user->save();

    //   return $user;

    return response()->json([
        'message' => 'Disabled successfully'
    ], 200);
    }

    public function disableuser(Request $request)
    {


      $user = User::where('id', $request->id)->first();

       $user->access = $request->access;
       $user->save();

    //    return $user;
    return response()->json([
        'message' => 'Disabled successfully'
    ], 200);
    }

    public function getalladmin(Request $request)
    {


      $user = admin::all();
       return $user;
    }

    public function getalluser()
    {


      $user = User::all();

       return $user;
    }

    public function loginsuper(Request $request)
    {


        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            // 'remember_me' => 'boolean'
        ]);


        $credentials = request(['email', 'password']);
        // if(!$credentials['verifyemail'] = 2) {
            // $verifyemail = User::where('email', $request->email)->first()->verifyemail;
            $theuser = Super::where('email', $request->email)->first();
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



}
