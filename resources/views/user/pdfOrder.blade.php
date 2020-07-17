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
                                    <td><img src = "{{'storage/images/'.$prod->image}}" style = "width:200px; height:150px"/></td>
                                @endif
                            @endforeach

                            @endif
                            @endforeach
                        </tr>
                </tbody>

            </table>
        </div>
