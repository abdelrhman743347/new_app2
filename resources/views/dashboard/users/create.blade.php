@extends('layouts.dashboard.app')

@section('content')
  <div class="page-title">
      <div class="page-breadcrumb">
        <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"> Dashboard</a></li>
                <li><a href="{{ route('dashboard.users.index') }}"> Users</a></li>
                <li><a href="{{ route('dashboard.users.index') }}">Create Users</a></li>
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
                  <form action="{{ route('dashboard.users.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('post') }}

                      <div class="form-row">
                        <div class="form-group col-md-6">
                              <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" 
                              placeholder="First Name">
                          </div>

                          <div class="form-group col-md-6">
                              <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" 
                              placeholder="Last Name">
                          </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <input type="email" name="email" class="form-control" value="{{ old('email') }} " placeholder="Email">
                        </div>

                          <div class="form-group col-md-6">
                              <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" 
                              placeholder="phone">
                          </div>
                      </div>

                          <div class="form-group col-md-12">
                              <input type="text" name="address" class="form-control" value="{{ old('address') }}" 
                              placeholder="Address">
                          </div>

                        <div class="form-group col-md-12">
                            <label>image</label>
                            <input type="file" name="image" class="form-control image" >
                        </div>

                        <div class="form-group col-md-12">
                            <img src="{{ asset('images/users_images/default.png') }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-row">
                          
                        <div class="form-group col-md-6">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>

                        <div class="form-group col-md-6">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation">
                        </div>
                        </div>

{{--                    <div class="form-group col-md-12">
                            <h2><label>Permissions</label></h2>
                            <div class="nav-tabs-custom">

                                @php
                                    $models = ['Users', 'Categories', 'Products'];
                                    $maps = ['create', 'read', 'update', 'delete'];
                                @endphp

                                <ul class="nav nav-tabs">
                                    @foreach ($models as $index=>$model)
                                        <li class="{{ $index == 0 ? 'active' : '' }}">
                                          <a href="#{{ $model }}" data-toggle="tab">{{ $model }}</a></li>
                                    @endforeach
                                </ul>

                                <div class="tab-content">

                                    @foreach ($models as $index=>$model)

                                        <div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="{{ $model }}">

                                            @foreach ($maps as $map)
                                                <label><input type="checkbox" name="permissions[]" value="{{ $map. '_' . $model }}"> {{ $map }}</label>
                                            @endforeach

                                        </div>

                                    @endforeach
                                </div><!-- end of tab content -->
                                
                            </div><!-- end of nav tabs -->       
                        </div> --}}

                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                        </div>
                  </form>
              </div>
          </div>
      </div>
    </div><!-- Row -->
  </div>


@endsection