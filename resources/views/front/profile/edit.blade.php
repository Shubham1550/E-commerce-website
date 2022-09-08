@extends('front.layouts.master')
@section('content')
    <div class="wrapper">
        <div class="container" style="margin-top: 50px">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    @if (\Session::has('msg'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('msg') !!}</li>
                            </ul>
                        </div>
                    @endif

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h3 class="panel-title"><strong>Edit Profile</strong></h3>
                        </div>

                        <div class="panel-body">

                            <form action="{{ route('user.profile.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" name="name" id="name" placeholder="Name"
                                        value="{{ $user->name }}" class="form-control border-input">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" id="email" placeholder="Email"
                                        value="{{ $user->email }}" class="form-control border-input">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" name="password" id="password" placeholder="Password"
                                        class="form-control border-input">
                                </div>

                                <div class="form-group">
                                    <label for="address">Address:</label>
                                    <textarea type="text" name="address" id="address" placeholder="Address" cols="30" rows="5"
                                        class="form-control border-input" value="{{ $user->address }}">{{ $user->address }}</textarea>
                                </div>


                                <div class="form-group">
                                    <button class="btn btn-outline-info col-md-2" type="submit">Update</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
