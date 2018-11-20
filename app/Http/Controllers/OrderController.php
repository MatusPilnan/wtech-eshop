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
        $cart = session('cart', array());
        $products = Product::whereIn('id', array_keys($cart))->get();
        $total = 0;
        foreach($products as $product)
        {
            $total += $product->price * $cart[$product->id];
        }
        return view('cart', compact('cart', $cart, 'products', $products, 'total', $total));
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
    public function update(Request $request)
    {
        $cart = session('cart', array());
        $cart[$request->product_id] = $request->qty;
        session(['cart'=> $cart]);
        return back();
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
        $deliveryOpts = Subcategory::where('name', 'doprava')->first()->products()->orderBy('price', 'asc')->get();
        $selected = $deliveryOpts->where('id', session('delivery_id', $deliveryOpts->first()->id))->first();
        $cart = session('cart', array());
        $products = Product::whereIn('id', array_keys($cart))->get();
        $total = 0;
        foreach($products as $product)
        {
            $total += $product->price * $cart[$product->id];
        }

        return view('delivery', compact('deliveryOpts', $deliveryOpts, 'selected', $selected, 'total', $total));
    }

    public function payment()
    {
        $paymentOpts = Subcategory::where('name', 'platba')->first()->products()->orderBy('price', 'asc')->get();
        $selected = $paymentOpts->where('id', session('payment_id', $paymentOpts->first()->id))->first();
        $cart = session('cart', array());
        $products = Product::whereIn('id', array_keys($cart))->get();
        $total = 0;
        foreach($products as $product)
        {
            $total += $product->price * $cart[$product->id];
        }

        return view('payment', compact('paymentOpts', $paymentOpts, 'selected', $selected, 'total', $total));
    }

    public function summary()
    {
        $cart = session('cart', array());
        $products = Product::whereIn('id', array_keys($cart))->get();
        $total = 0;
        foreach($products as $product)
        {
            $total += $product->price * $cart[$product->id];
        }
        $delivery_id = session('delivery_id', Subcategory::where('name', 'doprava')->first()->products()->orderBy('price', 'asc')->first()->id);
        $payment_id = session('payment_id', Subcategory::where('name', 'platba')->first()->products()->orderBy('price', 'asc')->first()->id);
        $delivery = Product::find($delivery_id);
        $payment = Product::find($payment_id);
        return view('summary', compact('cart', $cart, 'products', $products, 'total', $total, 'delivery', $delivery, 'payment', $payment));
    }

    public function addToCart(Request $request)
    {
        $cart = session('cart', array());
        
        if (isset($cart[$request->product_id]))
        {
            $cart[$request->product_id] += $request->qty;
        }
        else
        {
            $cart[$request->product_id] = $request->qty;
        }
        session(['cart'=> $cart]);
        return back();
    }

    public function removeFromCart(Request $request)
    {
        $cart = session('cart', array());
        unset($cart[$request->product_id]);
        session(['cart'=> $cart]);
        return back();
    }

    public function setDelivery(Request $request)
    {
        session(['delivery_id' => $request->delivery_id, 'town' => $request->town, 'street' => $request->street, 'zip' => $request->zip]);
        
        return redirect('/order/payment');
    }

    public function setPayment(Request $request)
    {
        session(['payment_id' => $request->payment_id]);
        return redirect('/order/summary');
    }

    public function fin()
    {
        $cart = session('cart', array());
        $products = Product::whereIn('id', array_keys($cart))->get();
        $order = Order::create(['user_id' => Auth::user()->id, 'completed' => TRUE, 'town' => session('town'), 'street' => session('street'), 'zip' => session('zip')]);
        $order->save();
        $delivery = Product::find(session('delivery_id'));
        $payment = Product::find(session('payment_id'));
        $order->products()->attach($delivery->id, ['qty' => 1]);
        $order->products()->attach($payment->id, ['qty' => 1]);
        foreach($products as $product)
        {
            $order->products()->attach($product->id, ['qty' => $cart[$product->id]]);
        }
        session(['cart' => array()]);

        return redirect('home');
    }
}
