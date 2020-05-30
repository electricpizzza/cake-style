@extends('layouts.app')

@section('content')

        <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="page-title text-center">
                            <h2>Registr</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="row justify-content-center">
        
        <div class="checkout_area section-padding-80 col-8">
            
            <form method="POST" action="{{ route('register') }}" onsubmit="authCart(this)">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="first_name">First Name <span>*</span></label>
                        <input  id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                         @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="last_name">Last Name <span>*</span></label>
                        <input  id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                         @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label for="country">Country <span>*</span></label>
                        <select class="w-100" id="country" @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>
                            <option value="usa">United States</option>
                            <option value="uk">United Kingdom</option>
                            <option value="ger">Germany</option>
                            <option value="fra">France</option>
                            <option value="mar">Morocco</option>
                            <option value="aus">Australia</option>
                            <option value="bra">Brazil</option>
                            <option value="cana">Canada</option>
                        </select>
                         @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label for="city">Town/City <span>*</span></label>
                        <input type="text" class="form-control" id="city" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city">
                         @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 mb-4">
                        <label for="email">Email Address <span>*</span></label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                         @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 mb-4">
                        <label for="password">Password <span>*</span></label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                         @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 mb-4">
                        <label for="password-confirm">Password <span>*</span></label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                         @error('password-confirm')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <div class="custom-control custom-checkbox d-block mb-2">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Terms and conitions</label>
                        </div>
                        <div class="custom-control custom-checkbox d-block mb-2">
                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                            <label class="custom-control-label" for="customCheck2">Create an accout</label>
                        </div>
                        <div class="custom-control custom-checkbox d-block">
                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                            <label class="custom-control-label" for="customCheck3">Subscribe to our newsletter</label>
                        </div>
                    </div>
                    <div class="form-group col-12 row mt-2 mb-0 mt-3">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn essence-btn">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <a class="btn btn-link m-5 text-center" href="{{ route('login') }}">
                {{ __('You already have an acounte?') }}
            </a>
        </div>
    </div>
@endsection
