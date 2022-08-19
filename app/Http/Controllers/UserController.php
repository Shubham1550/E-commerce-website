<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function index()
    {
        $user=User::all();
        return view('admin.users.index',compact('user'));
    }

    public function details($id)
    {
        $order=Order::with('user','products')->find($id);
        return view('admin.users.details',compact('order'));
        return redirect()->route('admin.users.details');
    }

    public function profile()
    {
        $user = Auth::user();
        // dd($user);

        return view('admin.profile',compact('user'));
    }

    public function profile_store(Request $request)
    {
        # code...

        $request->validate([
            'name'=>'nullable',
            'email'=>'nullable',
            'password'=>'nullable'
        ]);
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =bcrypt($request->password);
        $user->save();
        return redirect()->route('users.index');
    }


}
