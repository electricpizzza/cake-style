@extends('layouts.app')

@section('content')

<section class="single_product_details_area d-flex align-items-center">

    <div class="single_product_thumb clearfix">
        <div class="product_thumbnail_slides owl-carousel">
            @foreach ($product->images as $image)
            <img src="{{ $image->image }}" alt="">
            @endforeach
        </div>
    </div>

    <div class="single_product_desc clearfix">
        <span>{{ $product->brand }}</span>
        <a href="cart.html">
            <h2>{{ $product->title }}</h2>
        </a>
        <p class="product-price"><span class="old-price">{{ $product->price +100}} DH</span> {{ $product->price }} DH</p>
        <p class="product-desc">{{ $product->description }}.</p>
        @auth
        <form class="cart-form clearfix" action="/cart/{{$product->id}}" method="post">
        @endauth

            @csrf
            <div class="select-box d-flex mt-50 mb-30">
                <select name="size" id="productSize" class="mr-5">
                    @foreach ($sizes as $size)
                    <option value="{{$size}}">Size: {{$size}}</option>
                    @endforeach
                </select>
                <select name="color" id="productColor">
                    @foreach ($colors as $color)
                    <option value="{{$color}}">Color: {{$color}}</option>
                    @endforeach
                </select>
                <input type="text" value="{{$product->detail->sexe}}" name="sexe" hidden>
            </div>
            <div class="cart-fav-box d-flex align-items-center">
                @if ($product->quantity<=0)
                <button disabled name="addtocart" value="5" class="btn essence-btn">Sold Out</button>
                @else
                <button 
                @auth
                    type="submit"
                @endauth
                onclick="addToCart({{$product->id}})" name="addtocart" value="5" class="btn essence-btn">Add to cart</button>
                @endif
                <div class="product-favourite ml-4">
                    <a href="#" class="favme fa fa-heart"></a>
                </div>
            </div>
            @auth
        </form>
        @endauth
    </div>
</section>
@endsection
