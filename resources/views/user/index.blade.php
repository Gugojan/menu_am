@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('user/order/create ') }}">Home</a>

                <a href="{{url('/products/show_cart')}}"class="ml-3">
                    <span class="fa-stack fa-2x has-badge" data-count="{{session()->has('cart')
        ? session()->get('cart')->getTotalQty(): ''}}">
  <i class="fa fa-circle fa-stack-2x fa-inverse"></i>
  <i style="" class="fa fa-shopping-cart fa-stack-2x red-cart"></i>
</span>

                </a>
                    <div class="top-right links">
                    <a href="{{ url('user/order/'.auth()->user()->id.'/edit') }}">order</a>
                    </div>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="content">
            <div class="row justify-content-md-center text-danger">
               <h1>Product</h1>
            </div>

            <table class = "table table-striped">
                <thead>

                <tr>
                    <td>ID</td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Action</td>


                </tr>
                </thead>
                <tbody>
                @foreach($products as $p)
                    <tr>
                        <td>{{$p->id}}</td>
                        <td><img src = "{{asset('storage/images/'.$p->image)}}" style = "width:200px; height:150px"/></td>
                        <td>{{$p->product}}</td>
                        <td>{{$p->price}}</td>

                        <td>
                            <a href="{{route('addToCart',['id'=> $p->id])}}" class="btn btn-outline-primary">
                                Add to Cart
                            </a>
                            <form action="{{url("user/order")}}" method="post">
                                @csrf
                                <input type="submit" value = "Make an order" class="btn btn-outline-success">
                                <input type="hidden" value = "{{$p->id}}" name = "product_id">
                            </form>
                        </td>

                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection

