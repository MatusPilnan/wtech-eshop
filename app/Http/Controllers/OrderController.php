<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Subcategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $order = Auth::user()->cart();

        return view('cart', compact('order', $order));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order,  $product_id)
    {
        $order->products()->updateExistingPivot($product_id, ['qty' => $request->qty]);

        return redirect('cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function delivery()
    {
        $deliveryOpts = Subcategory::where('name', 'doprava')->first()->products;

        return view('delivery', compact('deliveryOpts', $deliveryOpts));
    }

    public function payment()
    {
        $paymentOpts = Subcategory::where('name', 'platba')->first()->products;

        return view('payment', compact('paymentOpts', $paymentOpts));
    }

    public function summary()
    {
        $order = Auth::user()->cart();

        return view('summary', compact('order', $order));
    }

    public function fin()
    {

        return redirect('home');
    }
}
