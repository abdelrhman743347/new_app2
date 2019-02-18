@extends('layouts.dashboard.app')

@section('content')
  <div class="page-title">
      <div class="page-breadcrumb">
        <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"> Dashboard</a></li>
                <li><a href="{{ route('dashboard.products.index') }}">Users</a></li>
                <li><a href="{{ route('dashboard.products.edit', $product->id) }}">Edit Product</a></li>
        </ol>
      </div>
  </div>
@include('partials._errors')
  <div id="main-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="panel panel-white">
              <div class="panel-heading clearfix">
                  <h4 class="panel-title">Update Product</h4>
              </div>
              <div class="panel-body">
                  <form action="{{ route('dashboard.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="form-group col-md-12">
                      <select name="category_id" class="form-control">
                        <option value="">All Category</option>
                          @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                          @endforeach
                      </select>
                    </div>

                      <div class="form-group col-md-12">
                          <input type="text" name="name" class="form-control" value="{{ $product->name }}" 
                          placeholder="Product Name">
                      </div>                          

                      <div class="form-group col-md-12">
                          <input type="text" name="description" class="form-control" value="{{ $product->description }}" 
                          placeholder="Description">
                      </div>                          

                      <div class="form-group col-md-12">
                          <input type="text" name="price" class="form-control" value="{{ $product->price}}" 
                          placeholder="Price">
                      </div>                          
                      <div class="form-group col-md-12">
                          <input type="text" name="stock" class="form-control" value="{{ $product->stock }}" 
                          placeholder="Stock">
                      </div>

                    <div class="form-group col-md-12">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control image" >
                    </div>

                    <div class="form-group col-md-12">
                        <img src="{{ $product->image_path }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
                    </div>

                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Update</button>
                        </div>
                  </form>
              </div>
          </div>
      </div>
    </div><!-- Row -->
  </div>


@endsection