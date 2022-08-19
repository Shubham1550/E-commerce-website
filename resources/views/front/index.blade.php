@extends('front.layouts.master')
@section('content')
<!-- Jumbotron Header -->
    <header class="jumbotron my-4">
        <h5 class="display-3"><strong>Welcome,</strong></h5>
        <p class="display-4"><strong>SALE UPTO 50%</strong></p>
        <p class="display-4">&nbsp;</p>
        <a href="#" class="btn btn-warning btn-lg float-right">SHOP NOW!</a>
    </header>
    @if (session()->has('msg'))
    <div class="alert alert-success">{{session()->get('msg')}}</div>
        {{-- .alert.alert-success{{session()->get('msg')}} --}}
    @endif
<div class="row text-center">
    @foreach ($product as $product)



        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="{{asset('uploads/'. $product->image)}}" alt="" height="200px" width="100px">
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text">
                        {{$product->description}}
                    </p>
                </div>
                <div class="card-footer">
                    <strong>${{$product->price}}</strong> &nbsp;
                    <form action="{{route('cart.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <input type="hidden" name="name" value="{{$product->name}}">
                        <input type="hidden" name="price" value="{{$product->price}}">

                    <button type="submit" class="btn btn-primary btn-outline-dark"><i class="fa fa-cart-plus "></i> Add To
                        Cart</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        {{-- <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="images/04_25.jpg" alt=""><!-- Image size 500*325 -->
                <div class="card-body">
                    <h5 class="card-title">Samsung Electronics UN65MU6500</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni
                        sapiente, tempore debitis beatae culpa natus architecto.</p>
                </div>
                <div class="card-footer">
                    <strong>$205.00</strong> &nbsp;
                    <a href="#" class="btn btn-primary btn-outline-dark"><i class="fa fa-cart-plus "></i> Add To
                        Cart</a>
                </div>
            </div>
        </div> --}}

        {{-- <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="images/10_3.jpg" alt="">
                <div class="card-body">
                    <h5 class="card-title">Polyester Laptop Backpack with USB</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse
                        necessitatibus neque.</p>
                </div>
                <div class="card-footer">
                    <strong>$50.00</strong> &nbsp;
                    <a href="#" class="btn btn-primary btn-outline-dark"><i class="fa fa-cart-plus "></i> Add To
                        Cart</a>
                </div>
            </div>
        </div> --}}

        {{-- <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="images/12.jpg" alt="">
                <div class="card-body">
                    <h5 class="card-title">Apple iMac 2017 21.5-inch Retina 4K</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni
                        sapiente, tempore debitis beatae culpa natus architecto.</p>
                </div>
                <div class="card-footer">
                    <strong>$355.00</strong> &nbsp;
                    <a href="#" class="btn btn-primary btn-outline-dark"><i class="fa fa-cart-plus "></i> Add To
                        Cart</a>
                </div>
            </div>
        </div> --}}


    </div>
@endsection
