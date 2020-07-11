@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('user/order') }}">Product</a>
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
                @foreach($user as $us)
                    <tr>
                        @if(auth()->user()->id == $us ->id)
                            <div class="row">
                       <div class="col-4"> <img src = "{{$us->avatar}}" alt="photo" style = "width:200px; height:150px"  />
                       </div>
                           <div class="col-6">
                               <h2>{{$us->name}}</h2>
                           </div>

                            </div>
                        @endif
                    </tr>
                @endforeach
        </div>
    </div>
@endsection

