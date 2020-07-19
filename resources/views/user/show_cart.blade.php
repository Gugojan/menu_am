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
                    <td></td>
                </tr>
                <tr>
                    <td>Total price</td>
                    <td rowspan="2">
                        {{$cart->getTotalPrice()}}
                    </td>
                    <td>        <form action="/pay" method="POST">
                            <script
                                src="https://checkout.stripe.com/checkout.js"
                                class="stripe-button"
                                data-key="pk_test_51H6iInGHMPQJ7YXOEuOLMo8kZ8GImNviXwqgjDmv6OuiFRd5QE5R0UXPhyii1JnU5uYtT6cXJ7xaW1TjMKctWE4Q00ygE08s9R"
                                data-name="T-shirt"
                                data-description="Comfortable cotton t-shirt"
                                data-amount={{$cart->getTotalPrice().'00'}}
                                    data-currency="usd">
                            </script>
                        </form>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
