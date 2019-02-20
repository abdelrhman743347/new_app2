@extends('layouts.dashboard.app')

@section('content')
  <div class="page-title">
      <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.index') }} ">Dashboard</a></li>

        </ol>
      </div>
  </div>
<div class="main-warpper">
  <div class="row">
    <div class="col-md-8">
      <h2>Orders</h2>
        
@foreach ($orders as $order)
    <div class="col-md-8">
      <table class="table">
        <thead><tr>
          <th>User name</th>
          <th>{{ $order->user_name }}</th>          
          <th>Address</th>
          <th>{{ $order->address }}</th>
        </tr></thead>

          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Product Nam</th>
              <th scope="col">Product img</th>

              <th scope="col">Unit Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Total Price</th>

            </tr>
          </thead>
          <tbody>
        @foreach ($order->cart->items as $item)
          <tr>
            <th scope="row">#</th>
            <td><strong>{{ $item['item']['name'] }}</strong></td>
            <td><img src="{{ $item['item']['image_path']}}" style="width: 100px;" class="img-thumbnail" alt=""></td>

            <td><strong>{{ $item['item']['price'] }}</strong></td>
            <td><strong class="badge">{{ $item['qty'] }}</strong></td>
            <td><strong >{{ $item['price'] }}</strong></td>

          </tr>
        @endforeach
          </tbody>
            <tfoot>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td><strong>Totle Price:</strong></td>
              <td><strong>{{ $order->cart->totalPrice }}</strong></td>
              <td>
                 <form action="{{ route('dashboard.orders.destroy', $order->id) }}" method="POST">

                  @csrf
                  @method('delete')

                  <button type="submit" class="btn btn-danger">Delete</button>
                  

                </form>
              </td>
            </tr>
          </tfoot>
      </table>

    </div>{{-- end of col12 --}}
    @endforeach
    </div>
  </div>
</div>
@endsection






