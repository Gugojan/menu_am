@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('user/order/create ') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="content">

            <h1>Order List</h1>
            <table class = "table table-striped">

                <thead>
                <tr>
                    <td>Product_ID</td>
                    <td>Product_image</td>
                </tr>
                </thead>

                <tbody>
                @foreach($order as $o)
                    @if($o->user_id == $user_id)
                    <tr>
                        <td>{{$o->product_id}}</td>

                        @foreach($product as $prod)
                        @if($prod->id == $o->product_id)
                            <td><img src = "{{asset('storage/images/'.$prod->image)}}" style = "width:200px; height:150px"/></td>
                        @endif
                        @endforeach
                    @endif
                        @endforeach
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
@endsection
