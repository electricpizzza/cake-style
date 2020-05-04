@extends('layouts.app')

@section('content')

    <div class="breadcumb_area bg-img" style="background-image: url(/img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>{{$category}}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="shop_grid_area section-padding-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                <div class="shop_sidebar_area">

                    <div class="widget catagory mb-50">
                        <h6 class="widget-title mb-30">Catagories</h6>

                        <div class="catagories-menu">
                            <ul id="menu-content2" class="menu-content collapse show">
                                <li data-toggle="collapse" data-target="#clothing">
                                    <a href="#">clothing</a>
                                    <ul class="sub-menu collapse" id="clothing">
                                        <li><a href="/{{$sexe}}/All">All</a></li>
                                        <li><a href="/{{$sexe}}/Bodysuits">Bodysuits</a></li>
                                        <li><a href="/{{$sexe}}/Dresses">Dresses</a></li>
                                        <li><a href="/{{$sexe}}/Hoodies">Hoodies &amp; Sweats</a></li>
                                        <li><a href="/{{$sexe}}/Jackets">Jackets &amp; Coats</a></li>
                                        <li><a href="/{{$sexe}}/Jeans">Jeans</a></li>
                                        <li><a href="/{{$sexe}}/Pants">Pants &amp; Leggings</a></li>
                                        <li><a href="/{{$sexe}}/Rompers">Rompers &amp; Jumpsuits</a></li>
                                        <li><a href="/{{$sexe}}/Blouses">Shirts &amp; Blouses</a></li>
                                        <li><a href="/{{$sexe}}/Sweaters">Sweaters &amp; Knits</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="/shoes">shoes</a>
                                </li>
                                <li>
                                    <a href="/accessories">accessories</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="widget price mb-50">
                        <h6 class="widget-title mb-30">Filter by</h6>
                        <p class="widget-title2 mb-30">Price</p>

                        <div class="widget-desc">
                            <div class="slider-range">
                                <div data-min="30" data-max="{{$products->max('price')}}" data-unit="DHs " class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="49" data-value-max="360" data-label-result="Range:">
                                    <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                </div>
                                <div class="range-price">Range: DHs 30 - DHs {{$products->max('price')}}</div>
                            </div>
                        </div>
                    </div>

                    <div class="widget brands mb-50">
                        <p class="widget-title2 mb-30">Brands</p>
                        <div class="widget-desc">
                            <ul>
                                @foreach (\App\Product::all('brand') as $brand)
                                <li><a class="text-uppercase" href="#">{{$brand->brand}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-8 col-lg-9">
                <div class="shop_grid_product_area">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-topbar d-flex align-items-center justify-content-between">
                                <div class="total-products">
                                    <p><span>{{$products->count()}}</span> products found</p>
                                </div>
                                <div class="product-sorting d-flex">
                                    <p>Sort by:</p>
                                    <form action="/{{$sexe.'/'.$category}}" method="get">
                                        <select name="sort" id="sortByselect" onchange="this.form.submit()" value="{{$sort->sort}}">
                                            <option value="latest">Newest</option>
                                            <option value="best">Highest Rated</option>
                                            <option value="pricehigh">Price: $$ - $</option>
                                            <option value="pricelow">Price: $ - $$</option>
                                        </select>
                                        <input type="submit" class="d-none" value="">
                                        <script>$('#sortByselect').val("{{$sort->sort??'latest'}}");</script>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($products->count()==0)
                    <div class="m-5 d-flex text-center justify-content-center flex-column">
                        <h2>More Items Comming Soon</h2>
                        <div class="checkout-btn mt-100">
                            <a href="/" class="btn essence-btn">Start Shopping</a>
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="single-product-wrapper">
                                <div class="product-img">
                                    <img src="{{ $product->images[0]->image }}" alt="">
                                    <img class="hover-img" src="{{ $product->images[1]->image }}" alt="">

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
                                    @if ($product->showen_as==='sale')
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
                        </div>
                        @endforeach
                    </div>
                </div>
                <nav aria-label="navigation">
                    <ul class="pagination mt-50 mb-70">
                        <?=$products->render()?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
@endsection
