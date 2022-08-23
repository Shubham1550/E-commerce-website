<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        $orders = Order::where('user_id',$id)->get();
        return view('front.profile.index',compact(['user','orders']));
    }

    public function show($id){
        $order = Order::find($id);
        Return view('front.profile.details',compact('order'));
    }

    public function edit(){
        return view('front.profile.edit');
    }
}
