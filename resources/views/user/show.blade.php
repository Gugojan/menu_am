@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('user/order') }}">Home</a>
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
            <div class="title m-b-md">
                <h2 class="text-center">Dear {{auth()->user()->name}} your order was successfully ordered</h2>
            </div>
        </div>
    </div>
@endsection



