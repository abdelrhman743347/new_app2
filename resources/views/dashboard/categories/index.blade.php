@extends('layouts.dashboard.app')

@section('content')
  <div class="page-title">
      <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.index') }} ">Dashboard</a></li>
            <li><a href="{{ route('dashboard.categories.index') }}">Categories</a></li>
        </ol>
      </div>
  </div>
  <div class="main-warpper">
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="panel ">
        {{-- <h3 class="panel-title">categories</h3> --}}
      <div class="panel-heading clearfix">
        <h4 class="panel-title">Categories</h4>
      </div>
    <div class="panel-body">
      @include('partials._errors')
        <form action="{{ route('dashboard.categories.index') }}" method="get">
          <div class="row">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->search }}">
            </div>

            <div class="col-md-4">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Search</button>

                @if (auth()->user()->hasPermission('create_categories'))
                    <a href="{{ route('dashboard.categories.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Category</a>
                @else
                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> Add Category</a>
                @endif
            </div>
          </div>
        </form><!-- end of form -->

      @if($categories->count() > 0)
        <div class="table-responsive project-stats ">  
          <table class="table ">
            <thead>
              <tr >
                <th>#</th>
                <th>Category Name</th>
                <th>Products Number</th>
                <th>Products Related</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $index=>$category)
                <tr>
                  <td>{{$index+1  }}</td>
                  <td>{{$category->name  }}</td>
                  <td>{{$category->products->count()  }}</td>
                  <td><a href="{{ route('dashboard.products.index',['category_id' => $category->id]) }}" class="btn btn-primary">Related Product</a></td>
                  <td>
                    @if (auth()->user()->hasPermission('update_categories'))
                      <a href="{{ route('dashboard.categories.edit', $category->id) }} " class="btn btn-info" >Edit</a>
                    @endif

                    @if (auth()->user()->hasPermission('delete_categories'))
                      <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="POST" style="display: inline-block;">
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
        {{ $categories->appends(request()->query())->links() }}
        @else
          <h1>No Data Found</h1>
      @endif
  </div>
    </div>
        </div>{{-- End of class col --}}
    </div>{{-- End of class row --}}
    </div>


@endsection