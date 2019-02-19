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
        <div class="panel-heading clearfix">
          <h4 class="panel-title">Categories</h4>
        </div>
    <div class="panel-body">
      @include('partials._errors')
      <h2>Orders</h2>
    </div>
  </div>
</div>
</div>
</div>
@endsection

