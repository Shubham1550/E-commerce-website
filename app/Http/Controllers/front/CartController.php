<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        # code...
        return view('front.cart.index');
    }

    public function store(Request $request)
    {
        # code...
        Cart::add($request->id, $request->name, $request->price);

        return redirect()->back()->with('msg','Item has been added to cart');
    }
}
