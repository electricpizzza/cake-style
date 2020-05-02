@extends('layouts.app')

@section('content')

<div class="breadcumb_area bg-img" style="background-image: url(/img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Favourite</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="text-center justify-content-center p-5">My favourites</h1>
            <hr class="m-5">
            <section class="cart_area">
                <div class="container">
                    @if ($favourites->count()==0)
                    <div class="m-5 d-flex text-center justify-content-center flex-column">
                        <h2>You Havent Liked anything Yet</h2>
                        <div class="checkout-btn mt-100">
                            <a href="/" class="btn essence-btn">Start Shopping</a>
                        </div>
                    </div>
                    @endif
                    <div class="cart_inner">
                        @foreach ($favourites as $favourite)
                        <div class="d-flex justify-content-between">
                            <h1 class="title p-3">favourite #{{$favourite->id}}</h1>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($favourite->items as $item)
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
                                    </tr> 
                                    @endforeach
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
