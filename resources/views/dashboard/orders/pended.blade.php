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
                <li class="breadcrumb-item active" aria-current="page">Pended Orders</li>
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
          <div class="card-header border-0">
            <h3 class="mb-0">Products</h3>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort" data-sort="name">id</th>
                  <th scope="col" class="sort" data-sort="budget">Amount(dhs)</th>
                  <th scope="col" class="sort" data-sort="status">Status</th>
                  <th scope="col-4">client</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody class="list">
                @foreach ($orders as $order)
                 <tr>
                  <th scope="row">
                    <div class="media align-items-center">
                      <div class="media-body">
                        <span class="name mb-0 text-sm">{{ $order->id }}</span>
                      </div>
                    </div>
                  </th>
                  <td class="budget">
                    {{ $order->amount }} DH
                  </td>
                  <td>
                    <span class="badge badge-dot mr-4">
                      <span class="status">{{$order->status??''}}</span>
                    </span>
                  </td>
                  <td>
                    {{$order->user->first_name.' '.$order->user->last_name}}
                  </td>
                  <td class="text-right">
                    <div class="dropdown">
                      <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button" data-toggle="dropdown"  aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="/order/{{ $order->id }}">Details</a>
                        <form id="Remove" action="remove/{{$order->id}}" method="POST">
                          <input class="dropdown-item" type="submit" value="{{ __('Remove') }}"/>
                          @csrf
                          @method('DELETE')
                        </form>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-footer py-4">
            <nav aria-label="...">
              <ul class="pagination justify-content-end mb-0">
            <?=$orders->render()?>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection