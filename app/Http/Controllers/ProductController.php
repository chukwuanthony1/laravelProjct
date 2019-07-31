<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imagename = $image->getClientOriginalName();
              $newname = rand()."-". $request->productname .".".$image->getClientOriginalExtension();
               $image -> move(public_path("productimages"), $newname);
             $path = url("productimages/".$newname);


            $request->validate([
                'productname' => 'required|string',
                'productprice' => 'required|string',
                // 'number' => 'required|string',
                // 'address' => 'required|string',
                // 'staffcategory_id' => 'required',
                // 'rating' => 'required',

                // 'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            // $category;
            // if( $request->category_id == 1) {
            //     $category = 'Cleaner';
            // }
            // if ( $request->staffcategory_id == 2) {
            //     $category = 'Driver';
            // }
            // if ( $request->staffcategory_id == 3) {
            //     $category = 'Mechanic';
            // }


            $book = product::create([
                'productname' => $request->productname,
                'productprice' => $request->productprice,
                'productid' => str_random(5),
                'admin_id' =>  $request->admin_id,
                'category_id' =>  $request->category_id,
                // 'staffcategory_id' => $request->staffcategory_id,
                // 'staffcategoryname' => $category,
                // 'staffstatus' =>$status,
                // 'password' => bcrypt('123456'),
                'image' => $path,
                // 'time'  => Carbon::now()->format('Y-m-d')
                // 'rating' => $request->rating
              ]);

            //   return new BookResource($book);
            return response()->json([
                'success' => 'Successfully created Product!'
            ], 201);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {

        $product->update($request->only(['productname','productprice']));

     return response()->json(['success' => 'Updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product->delete();

        return response()->json(['message' => 'deleted successfully'], 200);
    }
}
