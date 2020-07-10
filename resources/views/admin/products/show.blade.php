@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('admin/product') }}">Home</a>
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
                Product
            </div>

            <table class = "table table-striped">
                <tr>
                    <td>Product</td>
                    <td>{{$products->product??''}}</td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>{{$products->price??''}}</td>
                </tr>
                <tr>
                    <td>image</td>
                    <td><img src = "{{asset('storage/images/'.$products->image)}}" style = "width:200px; height:150px"/></td>
                </tr>
            </table>


            <a href = "{{url('admin/product')}}">Back</a>
        </div>
    </div>
@endsection



