@extends('layouts.dashboard.app')

@section('content')
  <div class="page-title">
      <div class="page-breadcrumb">
        <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"> Dashboard</a></li>
                <li><a href="{{ route('dashboard.users.index') }}"> Users</a></li>
                <li><a href="{{ route('dashboard.users.index') }}">Edit Users</a></li>
        </ol>
      </div>
  </div>
@include('partials._errors')
  <div id="main-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="panel panel-white">
              <div class="panel-heading clearfix">
                  <h4 class="panel-title">Update User</h4>
              </div>
              <div class="panel-body">
                  <form action="{{ route('dashboard.users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('put') }}

                      <div class="form-row">
                        <div class="form-group col-md-6">
                              <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" 
                              placeholder="First Name">
                          </div>

                          <div class="form-group col-md-6">
                              <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}" 
                              placeholder="Last Name">
                          </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <input type="email" name="email" class="form-control" value="{{ $user->email }} " placeholder="Email">
                        </div>

                          <div class="form-group col-md-6">
                              <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" 
                              placeholder="phone">
                          </div>
                      </div>

                          <div class="form-group col-md-12">
                              <input type="text" name="address" class="form-control" value="{{ $user->address }}" 
                              placeholder="Address">
                          </div>

                        <div class="form-group col-md-12">
                            <label>image</label>
                            <input type="file" name="image" class="form-control image" value="{{ $user->image_path }}" >
                        </div>

                        <div class="form-group col-md-12">
                            <img src="{{ $user->image_path }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-row">
                          
                        <div class="form-group col-md-6">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>

                        <div class="form-group col-md-6">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation">
                        </div>
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