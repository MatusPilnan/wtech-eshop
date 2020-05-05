<?php

namespace App\Http\Controllers;

use App\Product;
use App\Image;
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
    public function create(Request $request)
    {
        $data =  $request->json()->All();

        if (isset($data['id'])) {
            $product = Product::find($data['id']);
            $product->subcategory_id = $data['subcategory_id'];
            $product->name = $data['name'];
            $product->short_desc = $data['short_desc'];
            $product->long_desc = $data['long_desc'];
            $product->price = $data['price'];
            $product->manufacturer_id = $data['manufacturer_id'];
        }
        else {
            $product = Product::create([
                'subcategory_id' => $data['subcategory_id'],
                'name' => $data['name'],
                'short_desc' => $data['short_desc'],
                'long_desc' => $data['long_desc'],
                'price' => $data['price'],
                'manufacturer_id' => $data['manufacturer_id']
                ]);
        }

        $product->save();

        return response()->json(['status' => 'success', 'product_id' => $product->id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('products.detail', compact('product', $product));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        // error handling is up to you!!! ;)
        return response()->json(['status'=>'success','msg' => 'Product deleted successfully']);
    }


    public function miniImgs() {
        return Image::where('mini', True)->get()->toJson(JSON_PRETTY_PRINT);
    }

    public function getProduct($id) {
        return Product::find($id)->toJson(JSON_PRETTY_PRINT);
    }
}
