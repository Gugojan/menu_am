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
            <h1>Order List</h1>
            <table class = "table table-striped">
                <thead>

                <tr>
                    <td>ID</td>
                    <td>User_ID</td>
                    <td>Product_ID</td>


                </tr>
                </thead>
                <tbody>
                @foreach($order as $o)
                    <tr>
                        <td>{{$o->id}}</td>
                        <td>{{$o->user_id}}</td>
                        <td>{{$o->product_id}}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
