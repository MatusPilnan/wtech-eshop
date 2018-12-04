<?php

namespace App\Http\Controllers;

use App\Subcategory;
use App\Product;
use App\Manufacturer;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $order = request()->order;
        $manufacturer_id = request()->manufacturer_id;
        if (!isset($manufacturer_id))
        {
            $products = Product::where('subcategory_id', $id);
        }
        else
        {
            $products = Product::where('subcategory_id', $id)->where('manufacturer_id', $manufacturer_id);
        }
        if (!isset($order))
        {
            $order = 1;
        }
        switch($order)
        {
            case 0:
                $products = $products->orderBy('name', 'asc');
                break;
            case 1:
                $products = $products->orderBy('price', 'desc');
                break;
            case 2:
                $products = $products->orderBy('price', 'asc');
                break;
            default:
                $products = $products->orderBy('price', 'desc');
        }
        $products = $products->paginate(9);
        $sc = Subcategory::find($id);
        $manufacturers = Manufacturer::whereIn('id', Product::where('subcategory_id', $id)->pluck('manufacturer_id'))->get();

        return view('products.index', compact('products', $products, 'sc', $sc, 'manufacturers', $manufacturers, 'order', $order, 'manufacturer_id', $manufacturer_id));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        //
    }

    public function list() {
        return Subcategory::All()->toJson(JSON_PRETTY_PRINT);
    }
}
