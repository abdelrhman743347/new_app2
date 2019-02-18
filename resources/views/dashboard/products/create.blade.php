@extends('layouts.dashboard.app')

@section('content')
  <div class="page-title">
      <div class="page-breadcrumb">
        <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"> Dashboard</a></li>
                <li><a href="{{ route('dashboard.products.index') }}"> Products</a></li>
                <li><a href="{{ route('dashboard.products.create') }}">Create Products</a></li>
        </ol>
      </div>
  </div>
@include('partials._errors')
  <div id="main-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="panel panel-white">
              <div class="panel-heading clearfix">
                  <h4 class="panel-title">Add User</h4>
              </div>
              <div class="panel-body">
                  <form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('post') }}

                    <div class="form-group col-md-12">
                      <select name="category_id" class="form-control">
                        <option value="">All Category</option>
                          @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                          @endforeach
                      </select>
                    </div>

                      <div class="form-group col-md-12">
                          <input type="text" name="name" class="form-control" value="{{ old('name') }}" 
                          placeholder="Product Name">
                      </div>                          

                      <div class="form-group col-md-12">
                          <input type="text" name="description" class="form-control" value="{{ old('description') }}" 
                          placeholder="Description">
                      </div>                          

                      <div class="form-group col-md-12">
                          <input type="text" name="price" class="form-control" value="{{ old('price') }}" 
                          placeholder="Price">
                      </div>                          
                      <div class="form-group col-md-12">
                          <input type="text" name="stock" class="form-control" value="{{ old('stock') }}" 
                          placeholder="Stock">
                      </div>

                    <div class="form-group col-md-12">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control image" >
                    </div>

                    <div class="form-group col-md-12">
                        <img src="{{ asset('images/products_images/default.png') }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
                    </div>

                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add Product</button>
                    </div>
                  </form>
              </div>
          </div>
      </div>
    </div><!-- Row -->
  </div>


@endsection