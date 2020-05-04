@extends('layouts.app')

@section('content')
<div class="m-0 p-0">
    <section class="welcome_area bg-img background-overlay" style="background-image: url(img/bg-img/bg-1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                        <h6>asoss</h6>
                        <h2>New Collection</h2>
                        <a href="/w/All" class="btn essence-btn">view collection</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Welcome Area End ##### -->

    <!-- ##### Top Catagory Area Start ##### -->
    <div class="top_catagory_area section-padding-80 clearfix">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/bg-img/bg-2.jpg);">
                        <div class="catagory-content">
                            <a href="w/All">Clothing</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/bg-img/bg-3.jpg);">
                        <div class="catagory-content">
                            <a href="w/shoes">Shoes</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/bg-img/bg-4.jpg);">
                        <div class="catagory-content">
                            <a href="w/accessories">Accessories</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Top Catagory Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    <div class="cta-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content bg-img background-overlay" style="background-image: url(img/bg-img/bg-5.jpg);">
                        <div class="h-100 d-flex align-items-center justify-content-end">
                            <div class="cta--text">
                                <h6>-60%</h6>
                                <h2>Global Sale</h2>
                                <a href="/sales" class="btn essence-btn">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### CTA Area End ##### -->

    <!-- ##### New Arrivals Area Start ##### -->
    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Popular Products</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">
                        <?php $populair= \App\Product::latest()->paginate(6) ?>
                        @foreach ($populair as $product)
                        <div class="single-product-wrapper">
                            <div class="product-img">
                                <img src="/{{ $product->images[0]->image }}" alt="">
                                <img class="hover-img" src="{{ $product->images[2]->image }}" alt="">
                            
                                @if ($product->quantity<=0)
                                    <div class="product-badge solde-badge">
                                        <span>Sold Out</span>
                                    </div>
                                @else
                                @switch($product->showen_as)
                                    @case('new')
                                    <div class="product-badge new-badge">
                                        <span>New</span>
                                    </div>
                                        @break
                                    @case('sale')
                                    <div class="product-badge offer-badge">
                                        <span>-{{$product->sale}}%</span>
                                    </div>
                                        @break
                                        @case('normal')
                                        @break                                     
                                @endswitch
                                @endif
                                   
                                    <div onclick="addToFav({{ $product->id}});" class="product-favourite">
                                        <a href="#"  class="favme fa fa-heart"></a>
                                    </div>
                                </div>
                            <div class="product-description">
                                <span> {{ $product->brand }} </span>
                                <a href="/product/{{ $product->id}}">
                                    <h6> {{ $product->title }} </h6>
                                </a>
                                @if ($product->showen_as=='sale')
                                <p class="product-price"><span class="old-price"> {{ $product->price }} DH</span>  {{ $product->price-($product->price*$product->sale/100) }} DH</p>
                                @else
                                <p class="product-price">{{ $product->price }} DH</p>
                                @endif

                                <div class="hover-content">
                                    <div class="add-to-cart-btn">
                                        <a href="/product/{{$product->id}}" class="btn essence-btn">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### New Arrivals Area End ##### -->

    <!-- ##### Brands Area Start ##### -->
    <div class="brands-area d-flex align-items-center justify-content-between">
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="img/core-img/brand1.png" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="img/core-img/brand2.png" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="img/core-img/brand3.png" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="img/core-img/brand4.png" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="img/core-img/brand5.png" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="img/core-img/brand6.png" alt="">
        </div>
    </div>
</div>
@endsection
