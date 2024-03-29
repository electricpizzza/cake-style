@extends('layouts.app')

@section('content')
<div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Page Not Found - 404 :( </h2>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class='container'>
        <div class='row justify-content-center'>
            <div class='col-12 col-md-8'>
                <div class='regular-page-content-wrapper section-padding-80 d-flex flex-column justify-content-center'>
                    <div class='regular-page-text'>
                        <h2>What you are looking for is not available.</h2>
                        <blockquote>
                            <h6><i class='fa fa-quote-left' aria-hidden='true'></i> Sorry we coulden't find what you are looking maybe next time.</h6>
                            <div class="checkout-btn mt-100">
                                <a href="/" class="btn essence-btn">Start Shopping</a>
                            </div>
                        </blockquote>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
