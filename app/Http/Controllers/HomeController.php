<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prod = Subcategory::whereNotIn('name', ['doprava', 'platba'])->first()->products()->orderBy('created_at', 'desc')->get();
        $new = $prod->take(3);
        $rec = $prod->shuffle()->take(3);
        return view('home', compact('rec', $rec, 'new', $new));
    }
}
