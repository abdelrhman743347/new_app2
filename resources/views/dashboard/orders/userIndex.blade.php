@extends('layouts.app')

@section('content')

	<div class="row justify-content-center">
		@if (session('status'))
	    <div class="alert alert-success col-md-4">
	        {{ session('status') }}
	    </div><br>
		@endif
<h2 class="col-md-8">Your Orders</h2><br>
{{--       @foreach ($orders as $order)
      <ul>    
      	<li>{{ $order->user_id }}</li>
      	<li>{{ $order->user_name }}</li>
      	<li>{{ $order->address }}</li>
              

                @foreach ($order->cart->items as $item)
                <li>{{ $item['item']['name'] }} </li>
                <li>{{ $item['item']['price'] }} </li>
                <li>{{ $item['item']['image_path'] }} </li>
                <li>{{ $item['qty'] }}</li>
                <li>{{ $item['price'] }}</li>
                  
                  
                 
                @endforeach
      </ul>
      @endforeach
	</div>
	--}}
 	@foreach ($orders as $order)
		<div class="col-md-8">
			<table class="table">
			  	<thead class="thead-light">
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
				      	<strong> Waiting</strong>
				      </td>
				    </tr>
			  	</tfoot>
			</table>

		</div>{{-- end of col12 --}}
    @endforeach
@endsection
