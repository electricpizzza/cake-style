@extends('layouts.admin')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Products</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="/home"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active"><a href="#">Products</a></li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <a href="products/add" class="btn btn-neutral btn-lg pl-5 pr-5">New</a>
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
                  <th scope="col" class="sort" data-sort="name">Title</th>
                  <th scope="col" class="sort" data-sort="budget">Price</th>
                  <th scope="col" class="sort" data-sort="status">Category</th>
                  <th scope="col" class="sort" data-sort="completion">Available</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody class="list">
                @foreach ($products as $product)
                <tr>
                  <th scope="row">
                    <div class="media align-items-center">
                      <a href="/product/{{$product->id}}" class="media-body">
                        <span class="name mb-0 text-sm">{{ $product->title }}</span>
                      </a>
                    </div>
                  </th>
                  <td class="budget">
                    {{ $product->price }} DH
                  </td>
                  <td>
                    <span class="badge badge-dot mr-4">
                      <span class="status">{{$product->category_id??''}}</span>
                    </span>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="completion mr-2">{{($product->available/$product->quantity)*100}}%</span>
                      <div>
                        <div class="progress">
                          <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: {{($product->available/$product->quantity)*100}}%;"></div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="text-right">
                    <div class="dropdown">
                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown"  aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="/product/{{ $product->id }}">See</a>
                        <a class="dropdown-item" href="/products/{{ $product->id }}">Edit</a>
                        <form id="Remove" action="remove/{{$product->id}}" method="POST">
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
                <?=$products->render()?>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection