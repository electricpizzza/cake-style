@extends('layouts.app')

@section('content')
<div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Checkout</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="checkout_area section-padding-80">
<form action="/order" method="post" id="form">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="checkout_details_area mt-50 clearfix">

                    <div class="cart-page-heading mb-30">
                        <h5>Billing Address</h5>
                    </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name">First Name <span>*</span></label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{auth()->user()->first_name}}" required>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name">Last Name <span>*</span></label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{auth()->user()->last_name}}" required>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="country">Country <span>*</span></label>
                                <select class="w-100" id="country" name="country" value="{{auth()->user()->address->country}}">
                                    <option value="usa">United States</option>
                                    <option value="uk">United Kingdom</option>
                                    <option value="ger">Germany</option>
                                    <option value="fra">France</option>
                                    <option value="ma">Morocco</option>
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
                                <label for="address">Address <span>*</span></label>
                                <input type="text" class="form-control mb-3" id="address" name="address1" required  value="{{auth()->user()->address->address1 ?? old('address1')}}">
                                @error('address1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="text" class="form-control" id="address2" name="address2" value="{{auth()->user()->address->address2 ?? old('address2')}}">
                                @error('address2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="postcode">Postcode <span>*</span></label>
                                <input type="text" class="form-control" id="postcode" name="postcode" value="{{auth()->user()->address->postcode ?? old('postcode')}}">
                                @error('postcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="city">Town/City <span>*</span></label>
                                <input type="text" class="form-control" id="city" name="city" value="{{auth()->user()->address->city}}">
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="phone_number">Phone No <span>*</span></label>
                                <input type="number" class="form-control" id="phone" name="phone" min="0" required value="{{auth()->user()->phone}}">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 mb-4">
                                <label for="email_address">Email Address <span>*</span></label>
                                <input type="email" class="form-control" id="email" name="email" value="{{auth()->user()->email}}">
                            </div>
                            <div class="col-12">
                                <div class="custom-control custom-checkbox d-block mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="customCheck1" checked required>
                                    <label class="custom-control-label" for="customCheck1">Terms and conitions</label>
                                </div>
                                <div class="custom-control custom-checkbox d-block">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3" name="customCheck3" checked>
                                    <label class="custom-control-label" for="customCheck3">Subscribe to our newsletter</label>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                <div class="order-details-confirmation">

                    <div class="cart-page-heading">
                        <h5>Your Order</h5>
                        <p>The Details</p>
                    </div>

                    <ul class="order-details-form mb-4">
                        <li><span>Product</span> <span>Total</span></li>
                        <?php $total = 0; ?>
                        @foreach ($cartitems as $item)
                            <li><span>{{$item->detail->product->title}}</span> : <span>{{$item->detail->product->price}}DHs</span></li>
                        <?php $total +=$item->detail->product->price ; ?>
                        @endforeach
                        <li><span>Shipping</span> <span>Free</span></li>
                        <li><span>Total</span> <span>{{ $total }}dhs</span></li>
                    </ul>

                    <div id="accordion" role="tablist" class="mb-4">
                        <input hidden type="text" name="amount" value="{{$total}}">
                        <input  type="submit" class="btn essence-btn w-100 mb-3" id="submit" value="Place Order And Pay whene deliverd"/>
                        <div id="paypal-button-container"></div>
                        
                        <script>
                              paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: {{$total/10}}
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        $("#accordion").append(`<div class="alert alert-success" role="alert">
            Transaction completed by ${ details.payer.name.given_name} !
            <br><h1>Dont close this window !!</h1>
            </div>`);
        $("form").append(`<input hidden type="text" name="payed" value="payed">`);
        $("#submit").click();
      });
    }
  }).render('#paypal-button-container');
                          </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
