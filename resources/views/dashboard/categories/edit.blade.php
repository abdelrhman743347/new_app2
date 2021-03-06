@extends('layouts.dashboard.app')

@section('content')
  <div class="page-title">
      <div class="page-breadcrumb">
        <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"> Dashboard</a></li>
                <li><a href="{{ route('dashboard.categories.index') }}"> categories</a></li>
                {{-- <li><a href="{{ route('dashboard.categories.edit') }}">Create categories</a></li> --}}
        </ol>
      </div>
  </div>
@include('partials._errors')
  <div id="main-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="panel panel-white">
              <div class="panel-heading clearfix">
                  <h4 class="panel-title">Edit Category</h4>
              </div>
              <div class="panel-body">
                  <form action="{{ route('dashboard.categories.update', $category->id) }}" method="post" {{-- enctype="multipart/form-data" --}}>
                    @csrf
                    {{ method_field('put') }}

                      <div class="form-row">
                          <div class="form-group col-md-12">
                              <input type="text" name="name" class="form-control" value="{{ $category->name }}" 
                              placeholder="Category Name" required>
                          </div>

                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Update Category</button>
                        </div>
                  </form>
              </div>
          </div>
      </div>
    </div><!-- Row -->
  </div>


@endsection