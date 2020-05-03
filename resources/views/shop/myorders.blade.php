@extends('layouts.app')

@section('content')
    <div class="single-blog-post-thumb">
        <img src="img/bg-img/bg-8.jpg" alt="">
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="text-center justify-content-center p-5">My Orders</h1>
                <hr class="m-5">
                <section class="cart_area">
                    <div class="container">
                        @if ($orders->count()==0)
                        <div class="m-5 d-flex text-center justify-content-center flex-column">
                            <h2>You Havent Made An Perchest Yet</h2>
                            <div class="checkout-btn mt-100">
                                <a href="/" class="btn essence-btn">Start Shopping</a>
                            </div>
                        </div>
                        @endif
                        <div class="cart_inner">
                            @foreach ($orders as $order)
                            <div class="d-flex justify-content-between">
                                <h1 class="title p-3">Order #{{$order->id}}</h1>
                                <h5 class="title pt-5">Status : 
                                    @switch($order->status)
                                        @case("pended")
                                    <span class="text-warning text-capitalize">{{$order->status}}</span>
                                            @break
                                        @case("payed")
                                    <span class="text-info text-capitalize">{{$order->status}}</span>
                                            @break
                                        @case("deliverd")
                                    <span class="text-success text-capitalize">{{$order->status}}</span>
                                            @break
                                        @case("canceled")
                                    <span class="text-danger text-capitalize">{{$order->status}}</span>
                                            @break
                                            
                                    @endswitch
                                </h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->items as $item)
                                        <?php $product = $item->detail->product;?>
                                        <tr>
                                            <td>
                                                <a href="/product/{{$product->id}}" class="media">
                                                    <div class="d-flex">
                                                        <img src="/storage/{{$product->images->first()->image}}" class="h-100" width="100px" height="200px" alt="">
                                                    </div>
                                                    <div class="media-body p-3">
                                                        <h5>{{$product->title}}</h5>
                                                        <p>{{$product->quantity}}</p>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>
                                                <h5>{{$product->price}}DHs</h5>
                                            </td>
                                            <td>
                                                <h5>1</h5>
                                            </td>
                                            <td>
                                                <h5>{{$product->price}}DHs</h5>
                                            </td>
                                        </tr> 
                                        @endforeach
                                        <tr>
                                            <td>
                                                
                                            </td>
                                            <td>
                                                
                                            </td>
                                            <td>
                                                <h5>Subtotal</h5>
                                            </td>
                                            <td>
                                                <h5>{{$order->amount}}DHs</h5>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
