@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('admin/order') }}">Order_list</a>
                @else
                    <a href="{{ route('login') }}">
                    @lang('translate.login')</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">
                            @lang('translate.register')</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="content">
            <div  class="col-md-4 offset-md-5 text-danger">
               <h1>Product</h1>
            </div>
            <a href="{{url("admin/product/create")}}" class = "btn btn-primary">
                @lang('translate.add_new_product')</a>
            <div class="w-100"></div>
            <a href="{{route('product_export')}}" class="btn btn-outline-primary  offset-md-3 ">
                Export Products</a>
            <form action="{{route('product_import')}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="col-md-3">
                <input type="submit" value="{{__('translate.import_product')}}"
                       class="btn btn-outline-success">
                <div class="w-100"></div>
                <a href="{{route('pdf')}}"  class="btn btn-outline-success offset-md-3">
                    Export pdf</a>
            </form>
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

