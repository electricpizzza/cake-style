@extends('layouts.admin')

@section('content')
<form method="POST" action="/admin">
  @csrf
  @method('PATCH')
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
      <div class="row">
        <div class="col-lg-7 col-md-10">
          <h1 class="display-2 text-white">Hello {{auth()->user()->name}}</h1>
          <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
          <input type="submit" class="btn btn-neutral" value="Edit profile"/>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col order-xl-1">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">Edit profile </h3>
              </div>
              <div class="col-4 text-right">
                <a href="#!" class="btn btn-sm btn-primary">Settings</a>
              </div>
            </div>
          </div>
          <div class="card-body">
              <h6 class="heading-small text-muted mb-4">User information</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label" for="email">Email address</label>
                      <input type="email" id="email" name="email" class="form-control" placeholder="Your Email" value="{{auth()->user()->email}}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="first_name">First Name <span>*</span></label>
                    <input  id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{auth()->user()->first_name}}" required autocomplete="first_name" autofocus>
                     @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="last_name">Last Name <span>*</span></label>
                    <input  id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ auth()->user()->last_name }}" required autocomplete="last_name" autofocus>
                     @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div>
              </div>
              <hr class="my-4" />
              <!-- Address -->
              <h6 class="heading-small text-muted mb-4">Contact information</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="address1">Address</label>
                      <input id="address1"  name="address1" class="form-control" placeholder="Home Address" value="{{ auth()->user()->address->address1 }}" type="text">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="address2">Address</label>
                      <input id="address2" name="address2" class="form-control" placeholder="Home Address" value="{{ auth()->user()->address->address2 }}" type="text">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6 mb-3">
                    <label for="city">Town/City <span>*</span></label>
                    <input type="text" class="form-control" id="city" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ auth()->user()->address->city }}" required autocomplete="city">
                     @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                  <div class="col-6 mb-3">
                    <label for="country">Country <span>*</span></label>
                    <select class="form-control" id="country" @error('country') is-invalid @enderror" name="country" value="{{ auth()->user()->address->country }}" required autocomplete="country" autofocus>
                        <option value="usa">United States</option>
                        <option value="uk">United Kingdom</option>
                        <option value="ger">Germany</option>
                        <option value="fra">France</option>
                        <option value="ind">India</option>
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
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="postcode">Postal code</label>
                      <input type="number" id="postcode" name="postcode" value="{{ auth()->user()->address->postcode }}" class="form-control" placeholder="Postal code">
                    </div>
                  </div>
                </div>
              </div>
              <hr class="my-4" />
              <!-- Description -->
              <h6 class="heading-small text-muted mb-4">About me</h6>
              <div class="pl-lg-4">
                <div class="form-group">
                  <label class="form-control-label">About Me</label>
                  <textarea rows="4" class="form-control" placeholder="A few words about you ..."></textarea>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
  @endsection