@extends('admin.layouts.master')
@section('page')
Edit products
@endsection
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-md-10">
                @if (count($errors)>0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                <div class="card">
                    <div class="header">
                        <h4 class="title">Edit Product</h4>
                    </div>
                    <div class="content">
                        <form action="{{route('update',$product->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Name:</label>
                                        <input type="text" name="name" class="form-control border-input" placeholder="Enter product name" value="{{$product->name}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Product Price:</label>
                                        <input type="text" name="price" class="form-control border-input" placeholder="Enter price" value="{{$product->price}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Product Description:</label>
                                        <textarea name="description" id="" cols="30" rows="10"
                                                  class="form-control border-input" placeholder="Enter product Description" value="{{$product->description}}">{{$product->description}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Product Image:</label>
                                        <input type="file" name="image" class="form-control border-input" value="{{$product->image}}">
                                    </div>

                                </div>

                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Update Product</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
