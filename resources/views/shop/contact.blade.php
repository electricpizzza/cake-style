@extends('layouts.app')
<div class="contact-area d-flex align-items-center">

    <div class="google-map">
        <div id="googleMap"></div>
    </div>

    <div class="contact-info">
        <h2>Contact us</h2>
        <div>
            <form action="/message" method="post">
                    @csrf
                    <div class="col-12 mb-4">
                        <label for="email">Email Address <span>*</span></label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ auth()->user()->email ?? old('email') }}" required autocomplete="email">
                         @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 mb-4">
                        <label for="message">Mssage <span>*</span></label>
                        <textarea cols="10" rows="4" id="message" type="text" class="form-control @error('message') is-invalid @enderror" name="message" required autocomplete="new-message"></textarea>
                         @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn essence-btn">
                                {{ __('send') }}
                            </button>
                        </div>
                    </div>
            </form>
        </div>
        <div class="contact-address mt-3">
            <p><span>address:</span> 36 Av Chefchaouni, Rue Abdessalam Esserghini, Fes, Maroc</p>
            <p><span>telephone:</span> +212 34 542 116</p>
            <p><a href="mailto:contact@cakestyle.shop">contact@cakestyle.shop</a></p>
        </div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s"></script>
        <script src="js/map-active.js"></script>
    </div>    
</div>

@section('content')
  
@endsection
