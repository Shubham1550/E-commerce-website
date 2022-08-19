@extends('admin.layouts.master')
@section('page')
Add products
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
                        <h4 class="title">Add Product</h4>
                    </div>
                    <div class="content">
                        <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Name:</label>
                                        <input type="text" name="name" class="form-control border-input" placeholder="Enter product name">
                                    </div>

                                    <div class="form-group">
                                        <label>Product Price:</label>
                                        <input type="text" name="price" class="form-control border-input" placeholder="Enter product price">
                                    </div>

                                    <div class="form-group">
                                        <label>Product Description:</label>
                                        <textarea name="description" id="" cols="30" rows="10"
                                                  class="form-control border-input" placeholder="Enter product Description"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Product Image:</label>
                                        <input type="file" name="image" id="image" class="form-control border-input">
                                        <div id="thumb-output"></div>
                                    </div>

                                </div>

                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Add Product</button>
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
