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
                Create a product
            </div>
            <form action="/admin/product" method="post" enctype="multipart/form-data">
                @csrf
                <label for="product">Product</label>
                <input type="text" name = "product" id = "product">
                <label for="price">Price</label>
                <input type="number" name = "price" id = "price">
                <input type="file" name = "image" >
                <input type="submit" value = "Save">


            </form>
        </div>
    </div>
@endsection

