<?php

namespace App\Http\Controllers;

use App\Super;
use Illuminate\Http\Request;

class SuperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'got to super';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string',

            // 'remember_me' => 'boolean'
        ]);


        $banner = Super::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),


          ]);


          return response()->json([
            'success' => 'Successfully created new Super Admin !'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Super  $super
     * @return \Illuminate\Http\Response
     */
    public function show(Super $super)
    {

         return $super;

        // $user = Super::where('id', $request->id)->first();

        // return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Super  $super
     * @return \Illuminate\Http\Response
     */
    public function edit(Super $super)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Super  $super
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Super $super)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Super  $super
     * @return \Illuminate\Http\Response
     */
    public function destroy(Super $super)
    {
        //
    }
}
