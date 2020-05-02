@extends('layouts.admin')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Orders</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="/home"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="/orders">Orders</a></li>
                <li class="breadcrumb-item"><a href="/orders">Order Details</a></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header border-0 d-flex justify-content-between">
            <h3 class="mb-0">Order Details</h3>
            <form action="/orderstatus/{{$order->id}}" method="POST" class="d-inline">
                @method('PATCH')
                @csrf
                Status : 
                <select name="status" id="status" value={{$order->status}}>
                    <option value="pended">Pended</option>
                    <option value="payed">Payed</option>
                    <option value="deliverd">Deliverd</option>
                    <option value="canceled">Canceled</option>
                </select>
                <input  class="btn btn-neutral btn-sm" type="submit" value="Save">
            </form>
          </div>
          <div class="table-responsive col-12">
            <table class="table align-items-center table-responsive table-flush">
                <thead>
                    <tr>
                        <th scope="col-9">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                    <?php $product = $item->detail->product;?>
                    <tr>
                        <td>
                            <div class="media">
                                <div class="d-flex">
                                    <img src="/storage/{{$product->images->first()->image}}" class="h-100" width="100px" height="200px" alt="">
                                </div>
                                <div class="media-body p-3 text-justify">
                                    <h3>{{$product->title}}</h3>
                                </div>
                            </div>
                        </td>
                        <td>
                            <h3>{{$product->price}}DHs</h3>
                        </td>
                        <td>
                            <h5>1</h5>
                        </td>
                        <td>
                            <h5>{{$product->price}}DHs</h5>
                        </td>
                    </tr> 
                    @endforeach
                    <tr>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            <h5>Subtotal</h5>
                        </td>
                        <td>
                            <h5>{{$order->amount}}DHs</h5>
                        </td>
                    </tr>
                </tbody>
            </table>
          </div>
          <div class="container-fluid">
            <h3 class="mb-0">Client Details</h3>
            <hr>
              <table class="table">
                <thead>
                  <tr>
                    <th>Name : </th>
                    <th>phone : </th>
                    <th>Email</th>
                    <th>Adress :</th>
                    <th>City & Country</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td scope="row">{{$order->user->first_name.' '.$order->user->last_name}}</td>
                    <td>{{$order->user->phone}}</td>
                    <td>{{$order->user->email}}</td>
                    <td>{{$order->user->address->address1}} <br>{{$order->user->address->address2}}</td>
                    <td>{{$order->user->address->city}},{{$order->user->address->country}}</td>
                  </tr>

                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection