@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('user/order/create ') }}">Home</a>
                    <div class="w-100"></div>
                    <a href="{{route('user_pdf')}}"  class="btn btn-outline-success ">
                        Export pdf</a>
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
                <h1>Order List</h1>
            </div>

            <table class = "table table-striped">

                <thead>
                <tr>
                    <td>Product_name</td>
                    <td>Product_price</td>
                    <td>Product_image</td>
                </tr>
                </thead>

                <tbody>
                @foreach($order as $o)
                    @if($o->user_id == $user_id)
                    <tr>


                        @foreach($product as $prod)

                        @if($prod->id == $o->product_id)
                                <td>{{$prod->product}}</td>
                                <td>{{$prod->price}}</td>
                            <td><img src = "{{asset('storage/images/'.$prod->image)}}" style = "width:200px; height:150px"/></td>
                        @endif
                        @endforeach
                        <td>
                        <form action="{{url("user/order/{$o->id}")}}" method = "post">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="Delete" class="btn btn-danger" >
                        </form>
                        </td>
                    @endif
                        @endforeach
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
@endsection
