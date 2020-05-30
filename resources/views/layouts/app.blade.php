<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('CakeStyle') }}</title>



    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <script src="https://www.paypal.com/sdk/js?client-id=AZMyJ-eMTCWRQZgzgdoS9R5LCsINqAdrpx5QJEzblJicYnzG1JmWqN3dZjw0hMewVsUk23K20KnTRE0L"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/core-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <nav class="classy-navbar" id="essenceNav">
                <a class="nav-brand mt-md-3" href="/">
                    <picture>
                        <source srcset="/img/brand/brand1sml.png" media="(max-width: 750px)">
                        <source srcset="/img/brand/brand1.png">
                        <img src="/img/brand/brand1.png" alt="Flowers">
                      </picture>
                </a>
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <div class="classy-menu">
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <div class="classynav">
                        <ul>
                            <li><a href="#">Shop</a>
                                <div class="megamenu">
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Women's Collection</li>
                                        <li><a href="/w/Dresses">Dresses</a></li>
                                        <li><a href="/w/Blouses">Blouses &amp; Shirts</a></li>
                                        <li><a href="/w/tshirts">T-shirts</a></li>
                                        <li><a href="/w/Rompers">Rompers</a></li>
                                        <li><a href="/w/Bras">Bras &amp; Panties</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Men's Collection</li>
                                        <li><a href="/m/T-Shirts">T-Shirts</a></li>
                                        <li><a href="/m/Polo">Polo</a></li>
                                        <li><a href="/m/Shirts">Shirts</a></li>
                                        <li><a href="/m/Jackets">Jackets</a></li>
                                        <li><a href="/m/Trench">Trench</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Kid's Collection</li>
                                        <li><a href="/k/Dresses">Dresses</a></li>
                                        <li><a href="/k/Shirts">Shirts</a></li>
                                        <li><a href="/k/T-shirts">T-shirts</a></li>
                                        <li><a href="/k/Jackets">Jackets</a></li>
                                        <li><a href="/k/Trench">Trench</a></li>
                                    </ul>
                                    <div class="single-mega cn-col-4">
                                        <img src="/img/bg-img/bg-6.jpg" alt="">
                                    </div>
                                </div>
                            </li>
                            <li><a href="/about">About Us</a></li>
                            <li><a href="/contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="header-meta d-flex clearfix justify-content-end">
                <div class="search-area">
                    <form action="/sreach" method="get">
                        <input type="search" name="q" id="headerSearch" placeholder="Type for search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <div class="favourite-area">
                    <a href="/favourite"><img src="/img/core-img/heart.svg" alt=""></a>
                </div>
                <div class="user-login-info">
                    @guest
                    <a href="/login"><img src="/img/core-img/user.svg" alt=""></a>
                    @else
                    <a href="/myorders"><img src="/img/core-img/user.svg" alt=""></a>
                    @endguest
                </div>
                @auth
                <div class="cart-area">
                    <a href="#" id="essenceCartBtn"><img src="/img/core-img/bag.svg" alt=""> <span id="cartcount"></span><span>{{auth()->user()->cartitems()->count()??''}}</span></a>
                </div>
                @else
                <div class="cart-area">
                    <a href="#" id="essenceCartBtn"><img src="/img/core-img/bag.svg" alt=""> <span id="getscartcount"></span></a>
                </div>
                @endauth

            </div>

        </div>
    </header>

    <div class="cart-bg-overlay"></div>

    <div class="right-side-cart-area">

        <div class="cart-button">
            @auth
            <a href="#" id="rightSideCart"><img src="/img/core-img/bag.svg" alt=""> <span id="cartcount">{{auth()->user()->cartitems()->count()??''}}</span></a>
            @else
            <a href="#" id="rightSideCart"><img src="/img/core-img/bag.svg" alt=""> <span id="getscartcount"></span></a>
            @endauth
        </div>

        <div class="cart-content d-flex">
            @auth
            @if (auth()->user()->cartitems()->count()!=0)
            <div class="cart-list">
                <?php $sum=0;?>
                @foreach (auth()->user()->cartitems()->get() as $item)
                <?php 
                    $sum += $item->detail->product->price;
                ?>
                <div class="single-cart-item" id="{{'cartitem'.$item->id}}">
                    <div class="product-image">
                        <img src="{{$item->detail->product->images()->first()->image}}" class="cart-thumb" alt="">
                        <div class="cart-item-desc">
                            <span class="product-remove btn" onclick="removefromcart({{$item->id}})"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <span class="badge">{{$item->detail->product->brand}}</span>
                            <a href="/product/{{$item->detail->product->id}}"> <h6>{{$item->detail->product->title}}</h6></a>
                            <p class="size">Size: {{$item->detail->size}}</p>
                            <p class="color">Color: {{$item->detail->color}}</p>
                            <p class="price">{{$item->detail->product->price}} DHs</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="cart-amount-summary">

                <h2>Summary</h2>
                <ul class="summary-table">
                    <li><span>subtotal:</span> <span>{{$sum}} DHs</span></li>
                    <li><span>delivery:</span> <span> FREE</span></li>
                    <li><span>discount:</span> <span>-15%</span></li>
                    <li><span>total:</span> <span>{{$sum}} DHs</span></li>
                </ul>
                <div class="checkout-btn mt-100">
                    <a href="/checkout" class="btn essence-btn">check out</a>
                </div>
            </div>
            @else

            @endif
           <div class="cart-list">
                <div class="single-cart-item">
                    <a href="#" class="product-image">
                        <img src="/img/product-img/cart.jpg" class="cart-thumb" alt="">
                        <div class="cart-item-desc">
                          <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <h3 class="text-light">Your cart is empty !</h3>
                            <h6>Get somthing </h6>
                        </div>
                    </a>
                </div>
            </div>
            <div class="cart-amount-summary">

                <h2>Summary</h2>
                <ul class="summary-table">
                    <li><span>subtotal:</span> <span></span></li>
                    <li><span>delivery:</span> <span> </span></li>
                    <li><span>discount:</span> <span>-</span></li>
                    <li><span>total:</span> <span></span></li>
                </ul>
                <div class="checkout-btn mt-100">
                    <a href="/" class="btn essence-btn">Start Shopping</a>
                </div>
            </div>
            @else
            <div class="cart-list" id="gestCart">
                <div class="single-cart-item">
                    <a href="#" class="product-image">
                        <img src="/img/product-img/cart.jpg" class="cart-thumb" alt="">
                        <div class="cart-item-desc">
                          <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <h3 class="text-light">Your cart is empty !</h3>
                            <h6>Get somthing</h6>
                        </div>
                    </a>
                </div>
            </div>
            <div class="cart-amount-summary">

                <h2>Summary</h2>
                <ul class="summary-table">
                    <li><span>subtotal:</span> <span></span></li>
                    <li><span>delivery:</span> <span> </span></li>
                    <li><span>discount:</span> <span>-</span></li>
                    <li><span>total:</span> <span></span></li>
                </ul>
                <div class="checkout-btn mt-100">
                    <a href="/" class="btn essence-btn">Start Shopping</a>
                </div>
            </div>
            @endauth
        </div>
        -----
    </div>
    <div class="single-blog-wrapper">
        
        @yield('content')
   
    </div>
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="single_widget_area d-flex mb-30">
                        <div class="footer-logo mr-50">
                            <a href="/"><img src="/img/brand/brand2.png" width="200px" alt=""></a>
                        </div>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="/">Shop</a></li>
                                <li><a href="/about">About Us</a></li>
                                <li><a href="/contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="single_widget_area mb-30">
                        <ul class="footer_widget_menu">
                            <li><a href="/myorders">Order Status</a></li>
                            <li><a href="/info#payoptions">Payment Options</a></li>
                            <li><a href="/info#shipping">Shipping and Delivery</a></li>
                            <li><a href="/info#guides">Guides</a></li>
                            <li><a href="/info#policy">Privacy Policy</a></li>
                            <li><a href="/info#terms">Terms of Use</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row align-items-end">
                <div class="col-12 col-md-6">
                    <div class="single_widget_area">
                        <div class="footer_heading mb-30">
                            <h6>Subscribe</h6>
                        </div>
                        <div class="subscribtion_form">
                            <form action="#" method="post">
                                <input type="email" name="mail" class="mail" placeholder="Your email here">
                                <button type="submit" class="submit"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="single_widget_area">
                        <div class="footer_social_area">
                            <a href="https://facebook.com/cakestyleshop" target="_blank" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="https://instagram.com/cakestyleshop" target="_blank" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="https://twitter.com/cakestyleshop" target="_blank" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="https://pinterest.com/cakestyleshop" target="_blank" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="https://youtube.com/cakestyleshop" target="_blank" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-12 text-center">
                    <p>
                        Copyright &copy;2020</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">Zakariae Dinar</a>
                    </p>
                </div>
            </div>

        </div>
    </footer>

    <script src="/js/jquery/jquery-2.2.4.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/classy-nav.min.js"></script>
    <script src="/js/active.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

@guest
<script>
     function getProd(id) {   
        return fetch('/productcart/'+id).then(resp=>resp.json()).then(data=>data);
     }
     getProd(1).then(da=>{
         console.log(da);
         
     });

   
   function removefromcart(id) {
    let cart = JSON.parse(localStorage['productsInCart']);
    $(`#cartitem${id}`).remove();
        for (let index = 0; index < cart.items.length; index++) {
            const element = cart.items[index];
            if (element.id==id) {
                 cart.items.splice(index,index+1);
            }
        }

        $("#getscartcount").each(function (index, element) {
        $(this).html(cart.items.length);
        });
        localStorage.setItem('productsInCart', JSON.stringify(cart));
        if (cart.items.length==0) {
        localStorage.removeItem('productsInCart');
        $("#gestCart").children().remove();
        $("#getscartcount").each(function (index, element) {
        $(this).html("");
        });
         }   
     }
     function addToCart(id) { 
        getProd(1).then(data=>{
            product = data[0];
            detail = data[1];
            image = data[2];
        console.log(product);

        var items = {
    "id": id ,
    "image":image.image,
    "brand":product.brand,
    "title":product.title,
    "price":product.price
};
if (localStorage.getItem("productsInCart") === null) {
    var cartItems = {};
    var items = [{
        "id": id ,
        "image":image.image,
        "brand":product.brand,
        "title":product.title,
        "price":product.price
    }];
    cartItems.items=items;
    $("#gestCart").children().remove();
    }
    else{
    var cartItems = JSON.parse(localStorage.getItem("productsInCart"));
    cartItems.items.push(items);
    }

    localStorage.setItem('productsInCart', JSON.stringify(cartItems));

$("#getscartcount").each(function (index, element) {
    $(this).html(cartItems.items.length);
});





const cartitem = ` <div class="single-cart-item" id="cartitem${id}">
            <div class="product-image">
                <img src="${image.image}" class="cart-thumb" alt="">
                <div class="cart-item-desc">
                    <span class="product-remove btn" onclick="removefromcart(${id})"><i class="fa fa-close" aria-hidden="true"></i></span>
                    <span class="badge">${product.brand}</span>
                    <a href="/product/${product.id}"> <h6>${product.title}</h6></a>
                    <p class="size">Size: NaN</p>
                    <p class="color">Color: NaN</p>
                    <p class="price">${product.price} DHs</p>
                </div>
            </div>
        </div>`;



$("#gestCart").append(cartitem);
     });
}


     $(function () {
         
    const localCart = JSON.parse(localStorage['productsInCart']);

    $("#getscartcount").each(function (index, element) {
        $(this).html(localCart.items.length);
        });
    $("#gestCart").children().remove();
    if (localCart.items.length==0) {
        localStorage.removeItem('productsInCart');
    }    
    localCart.items.forEach(element => {        
        const cartitem = ` <div class="single-cart-item" id="cartitem${element.id}">
                    <div class="product-image">
                        <img src="${element.image}" class="cart-thumb" alt="">
                        <div class="cart-item-desc">
                            <span class="product-remove btn" onclick="removefromcart(${element.id})"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <span class="badge">${element.brand}</span>
                            <a href="/product/${element.id}"> <h6>${element.title}</h6></a>
                            <p class="size">Size: NaN</p>
                            <p class="color">Color: NaN</p>
                            <p class="price">${element.price} DHs</p>
                        </div>
                    </div>
                </div>`;
        if (element!='') 
        $("#gestCart").append(cartitem);
    });
     });
     
</script> 
@endguest

</body>
</html>