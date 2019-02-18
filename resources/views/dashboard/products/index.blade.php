@extends('layouts.dashboard.app')

@section('content')
  <div class="page-title">
      <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
            <li><a href="{{ route('dashboard.products.index') }}">Products</a></li>
        </ol>
      </div>
  </div>
  <div class="main-warpper">
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="panel ">
        {{-- <h3 class="panel-title">products</h3> --}}
      <div class="panel-heading clearfix">
        <h4 class="panel-title">Products</h4>
      </div>
    <div class="panel-body">
      @include('partials._errors')
          <form action="{{ route('dashboard.products.index') }}" method="get">
          <div class="row">
            <div class="col-md-3">
                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->search }}">
            </div>

            <div class="col-md-2">
                <select name="category_id" class="form-control">
                  <option value="">Category</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}" {{ request()->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach 
              </select>
            </div>     


            <div class="col-md-2">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Search</button>
                @if (auth()->user()->hasPermission('create_products'))
                    <a href="{{ route('dashboard.products.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add product</a>
                @else
                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> Add Product</a>
                @endif
            </div>

          </div>
          </form><!-- end of form -->

      @if($products->count() > 0)
      <div class="table-responsive project-stats text-center">  
        <table class="table ">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Description</th>
              <th>price</th>
              <th>Stock</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $index=>$product)
              <tr>
                {{-- <th scope="row">452</th> --}}
                <td>{{$index+1  }}</td>
                <td>{{$product->name  }}</td>
                <td>{{$product->description  }}</td>
                <td>{{$product->price  }}</td>
                <td>{{$product->stock  }}</td>
                <td><img src="{{ $product->image_path }}" style="width: 100px;" class="img-thumbnail" alt=""></td>
                <td>
                  @if (auth()->user()->hasPermission('update_products'))
                    <a href="{{ route('dashboard.products.edit',$product->id) }} " class="btn btn-info" >Edit</a>
                  @endif

                  @if (auth()->user()->hasPermission('delete_products'))
                    <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                      @csrf
                      {{ method_field('delete') }}
                      <button type="submit" class="btn btn-danger delete">Delete</button>
                    </form>                                                        
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{ $products->appends(request()->query())->links() }}
      {{-- {{ $products->links() }} --}}
      @else
        <h1>No Data Found</h1>
      @endif
  </div>
    </div>
        </div>{{-- End of class col --}}
    </div>{{-- End of class row --}}
    </div>


@endsection