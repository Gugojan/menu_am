@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('user/order') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="content">
            <div class="title m-b-md">
                Cart
            </div>
            ​
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                </tr>
                </thead>
                <tbody>
                @foreach($cart->items as $p)
                    <tr>
                        <td><img src="{{asset('storage/images/'.$p['product']->image)}}" style="width:200px; height:150px"/></td>
                        <td>{{$p['product']->product}}</td>
                        <td>{{$p['price']}}</td>
                        <td>
                            {{$p['qty']}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td>Total quantity</td>
                    <td rowspan="2">
                        {{$cart->getTotalQty()}}
                    </td>
                </tr>
                <tr>
                    <td>Total price</td>
                    <td rowspan="2">
                        {{$cart->getTotalPrice()}}
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
