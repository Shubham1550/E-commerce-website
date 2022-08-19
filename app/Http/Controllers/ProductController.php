<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'image'=>'required'
        ]);

        $product=new Product();
        $product->name=$request->name;
        $product->price=$request->price;
        $product->description=$request->description;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads',$filename);
            $product->image = $filename;
        }
        $product->save();
        return redirect()->route('admin.product.index')->with('message', 'Data Added Successfully!');
    }

    public function index()
    {
        $product=Product::all();
        return view('admin.products.index',compact('product'));

    }

    public function edit($id)
    {
       $product=Product::find($id);
       return view('admin.products.edit',compact('product'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'required'
        ]);

        $product=Product::find($id);
        $product->name=$request->name;
        $product->price=$request->price;
        $product->description=$request->description;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads',$filename);
            $product->image = $filename;
        }
        $product->update();
        return redirect()->route('admin.product.index')->with('message', 'Data Updated Successfully!');
    }

    public function delete($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect()->route('admin.product.index')->with('message', 'Data Deleted Successfully!');
    }

    public function detail($id)
    {
        $product=Product::find($id);
        return view('admin.products.details',compact('product'));
    }
}

