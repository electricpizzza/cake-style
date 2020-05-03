@extends('layouts.admin')

@section('content')

<form method="POST" action="/productscreate" enctype="multipart/form-data">
    @csrf 
  <div class="header pb-6 d-flex align-items-center" style="min-height: 100px; background-image: url(/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col">
            <h1 class="display-2 text-white">Product Settings</h1>
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
                  <h3 class="mb-0">Edit Product </h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                </div>
              </div>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">Main information</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label class="form-control-label" for="title">Title <span>*</span></label>
                            <input type="title" id="title" name="title" class="form-control" required placeholder="Title" required value="{{$product->title ?? old('title') }}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                          </div>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="category">Category <span>*</span></label>
                            <select class="form-control selectpicker"  id="category" @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autocomplete="category" autofocus>
                                <option value="Dresses">Dresses</option>
                                <option value="Blouses">Blouses &amp; Shirts</option>
                                <option value="tshirts">T-shirts</option>
                                <option value="Rompers">Rompers</option>
                                <option value="Bras">Bras &amp; Panties</option>
                                <option value="Jackets">Jackets</option>
                                <option value="Trench">Trench</option>
                            </select>
                             @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <label for="sexe">Sexe <span>*</span></label>
                            <select class="form-control selectpicker" id="sexe" @error('sexe') is-invalid @enderror" name="sexe" value="{{ old('sexe') }}" required autocomplete="sexe" autofocus>
                                <option value="W">Women</option>
                                <option value="M">Men</option>
                                <option value="K">Kids</option>
                            </select>
                             @error('sexe')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                 
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Detail information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                   
                    <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="">Price</label>
                          <input type="number" id="price" name="price" value="{{$product->price ?? old('price') }}" class="form-control" required placeholder="Price">
                          @error('price')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="quantity">Quantity</label>
                          <input type="number" id="quantity" name="quantity" value="{{old('quantity') }}" class="form-control" required placeholder="Quantity">
                        
                          @error('quantity')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror</div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="">Tags</label>
                          <input type="text" id="tag" name="tag" value="{{old('tag') }}" class="form-control"  placeholder="Tag1,Tag2, ...">
                          @error('tag')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                      </div>
                  </div>
                  <div class="row">
                  <div class="col-md-4">
                      <label class="form-control-label" for="image1">Image 1</label>
                    <div class="dropzone">
                        <img src="http://100dayscss.com/codepen/upload.svg" class="upload-icon" />
                        <input type="file" name="image1" id="image1" required class="upload-input btn" />
                      </div>
                      @error('image1')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  </div>
                  <div class="col-md-4">
                      <label class="form-control-label" for="image2">Image 2</label>
                    <div class="dropzone">
                        <img src="http://100dayscss.com/codepen/upload.svg" class="upload-icon" />
                        <input type="file" name="image2" id="image2" class="upload-input btn" />
                    </div>
                    @error('image2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                  <div class="col-md-4">
                      <label class="form-control-label" for="image3">Image 3</label>
                    <div class="dropzone">
                        <img src="http://100dayscss.com/codepen/upload.svg" class="upload-icon" />
                        <input type="file" name="image3" id="image3" class="upload-input btn" />
                    </div>
                    @error('image1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                  </div>
                </div>
                <hr class="my-4" />
                <div class="row">
                   
                  <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="">Brand</label>
                        <input type="text" id="brand" name="brand" value="{{old('brand') }}" class="form-control" required placeholder="Brand">
                        @error('brand')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="size">Size</label>
                        <select class="form-control selectpicker" multiple type="text" id="size" name="size[]" value="{{ old('size[]') }}"  required placeholder="Size">
                          <option value="S">S</option>
                          <option value="M">M</option>
                          <option value="L">L</option>
                          <option value="XL">XL</option>
                          <option value="XXL">XXL</option>
                        </select>
                        @error('size')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="">Color</label>
                        <select class="form-control selectpicker" multiple type="text" id="color" name="color[]" value="{{ old('color[]') }}"  required placeholder="Color">
                        <option value="BLACK">BLACK</option>
                        <option value="WHITE">WHITE</option>
                        <option value="RED">RED</option>
                        <option value="BLUE">BLUE</option>
                        <option value="GREEN">GREEN</option>
                        <option value="PINK">PINK</option>
                        </select>
                      </div>
                    </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Description</h6>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label" for="showen_as">Showen As</label>
                    <select class="form-control selectpicker" type="text" id="showen_as" name="showen_as" value="{{ old('showen_as') }}"  required placeholder="Showen As">
                      <option value="new" selected>New</option>
                      <option value="sale">Sale</option>
                      <option value="normal">Normal</option>
                      <option value="hiden">Hiden</option>
                    </select>
                    @error('showen_as')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label" for="">Sale Value</label>
                    <input type="text" id="sale" name="sale" value="{{old('sale') }}" class="form-control" required placeholder="Sale Value %">
                    @error('sale')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                </div>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Description</label>
                  <textarea rows="4" class="form-control" name="description"  placeholder="A few words about the product ...">{{ old('description') }}</textarea>
                  </div>
                </div>
                <hr class="my-4" />
                <input type="submit" class="btn btn-neutral" value="Save Product"/>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection