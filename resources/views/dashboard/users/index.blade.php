@extends('layouts.dashboard.app')

@section('content')
  <div class="page-title">
      <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="index.html">Dashboard</a></li>
            <li><a href="#">Users</a></li>
        </ol>
      </div>
  </div>
  <div class="main-warpper">
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="panel ">
        {{-- <h3 class="panel-title">Users</h3> --}}
      <div class="panel-heading clearfix">
        <h4 class="panel-title">Users</h4>
      </div>
    <div class="panel-body">
      @include('partials._errors')
        <form action="{{ route('dashboard.users.index') }}" method="get">
          <div class="row">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->search }}">
            </div>

            <div class="col-md-4">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Search</button>

                @if (auth()->user()->hasPermission('create_users'))
                    <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add User</a>
                @else
                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> Add User</a>
                @endif
            </div>
          </div>
        </form><!-- end of form -->

      @if($users->count() > 0)
      <div class="table-responsive project-stats text-center">  
        <table class="table ">
          <thead>
            <tr>
              <th>#</th>
              <th>First NAme</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $index=>$user)
              <tr>
                {{-- <th scope="row">452</th> --}}
                <td>{{$index+1  }}</td>
                <td>{{$user->first_name  }}</td>
                <td>{{$user->last_name  }}</td>
                <td>{{$user->email  }}</td>
                <td><img src="{{ $user->image_path }}" style="width: 100px;" class="img-thumbnail" alt=""></td>
                <td>
                  @if (auth()->user()->hasPermission('update_users'))
                    <a href="{{ route('dashboard.users.edit',$user->id) }} " class="btn btn-info" >Edit</a>
                  @endif

                  @if (auth()->user()->hasPermission('delete_users'))
                    <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
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
      {{ $users->links() }}
      @else
        <h1>No Data Found</h1>
      @endif
  </div>
    </div>
        </div>{{-- End of class col --}}
    </div>{{-- End of class row --}}
    </div>


@endsection