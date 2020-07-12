@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('admin/order') }}">Order_list</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="content">
            <div  class="col-md-4 offset-md-5 text-danger">
               <h1>Product</h1>
            </div>
            <a href="{{url("admin/product/create")}}" class = "btn btn-primary">Add new product</a>

            <table class = "table table-striped">
                <thead>

                <tr>
                    <td>ID</td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>


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
                            <a href="{{url("admin/product/{$p->id}")}}" class = "btn btn-primary">View</a>
                            <a href="{{url("admin/product/{$p->id}/edit")}}" class = "btn btn-success">Edit</a>
                            <form action="{{url("admin/product/{$p->id}")}}" method = "post">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Delete" class="btn btn-danger" >
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>
    </div>
@endsection

