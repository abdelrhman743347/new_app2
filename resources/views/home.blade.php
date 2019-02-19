@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{-- Dashboard --}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- You are logged in! --}}
                </div>

<div class="container">
  @include('partials._errors')
  <div class="row justify-content-md-center">
    <div class="col-md-12">

            

        <form action="#" method="get">
        <div class="row justify-content-md-center">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->search }}">
        </div>

        <div class="col-md-4">
            <select name="category_id" class="form-control">
                  <option value="">Category</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}" {{ request()->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach 
            </select>
        </div>     


        <div class="col-md-3">
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Search</button>
        </div>
      </div>
  </form><!-- end of form -->

<br>
    <div class="row justify-content-md-center">
            @if($products->count() > 0)
                @foreach ($products as $product)
                <div class="col-md-3" style="max-width: 18rem">
                    <div class="card mb-3">
                        <div class="card-header bg-dark text-white">
                            {{ $product->name }}
                        </div>
                        <div class="card-body">
                            <img src="{{ $product->image_path }}" style="width: 15rem; height: 10rem" alt="">
                            <div class="card-text">
                                {{ $product->description }}
                            </div>                            
                            <div class="card-text">
                                {{ $product->price }} $
                            </div>
                            <br>
                                <form action="{{ route('carts.getAddToCart') }}" method="post">
                                    @csrf
                                    {{ method_field('post') }}
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
{{--                                     <input type="hidden" name="product_name" value="{{ $product->name }}">
                                    <input type="hidden" name="product_price" value="{{ $product->price }}"> --}}
                                    {{-- <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"> --}}
                                
                                    <button type="submit"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                </form>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
            <H1>No Data Found</H1>
            @endif
    </div><!-- Row -->
        {{ $products->appends(request()->query())->links() }}
</div>

            </div>
        </div>
    </div>
</div>
@endsection
