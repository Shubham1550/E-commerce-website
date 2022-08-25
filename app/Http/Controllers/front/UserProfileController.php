<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        $orders = Order::where('user_id',$id)->get();
        return view('front.profile.index',compact(['user','orders']));
    }

    public function show($id)
    {
        $order = Order::find($id);
       return view('front.profile.details',compact('order'));
    }

    public function edit(){
        $user = Auth::user();
        return view('front.profile.edit', compact('user'));
    }

    public function edit_profile_store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'address'=>'required'
        ]);

        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =bcrypt($request->password);
        $user->address = $request->address;
        $user->save();
        return redirect()->back()->with('msg','Your data Update Successfully !');
    }
}
