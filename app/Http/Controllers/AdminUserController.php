<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use Illuminate\support\Facades\Auth;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
       return view('admin.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $credentials=$request->only('email','password');
        if(! Auth::guard('admin')->attempt($credentials)){
            return redirect()->back()->withErrors([
                'message'=>'wrong credentials please try again'
            ]);
        }
        session()->flash('message','you have been logged in');
        return redirect('admin/');

        $admin= new AdminUser();
        $admin->email=$request->email;
        $admin->password=$request->password;
        $admin->save();
        // dd($request->all());
    }
}
