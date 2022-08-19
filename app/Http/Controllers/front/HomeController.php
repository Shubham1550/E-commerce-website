<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        # code...
        $product=Product::inRandomOrder()->take(4)->get();
        return view('front.index',compact('product'));
    }
}
