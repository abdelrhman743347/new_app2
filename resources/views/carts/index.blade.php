@extends('layouts.app')

@section('content')

	<div class="row justify-content-center">
		@if (session('status'))
	    <div class="alert alert-success col-md-4">
	        {{ session('status') }}
	    </div><br>
		@endif
	@if (Session::has('cart'))
		<div class="col-md-8">
		<table class="table">
		  	<thead class="thead-light">
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Product Nam</th>
			      <th scope="col">Unit Price</th>
			      <th scope="col">Quantity</th>
			      <th scope="col">Total Price</th>
			      <th scope="col">Action</th>
			    </tr>
		  	</thead>
	  	<tbody>
			@foreach ($products as $product)
		    <tr>
		      <th scope="row">#</th>
		      <td><strong>{{ $product['item']['name'] }}</strong></td>
		      <td><strong>{{ $product['item']['price'] }}</strong></td>
		      <td><strong class="badge">{{ $product['qty'] }}</strong></td>
		      <td><strong >{{ $product['price'] }}</strong></td>
		      	<td>
		      		<div class="btn-group">
						<button class="btn btn-primary dropdown-toggle" 
								data-toggle ="dropdown">Action
								<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a href="#">Reduce by one</a></li>
							<li><a href="#">Reduce all</a></li>
						</ul>
					</div>
				</td>
		    </tr>
			@endforeach
    	</tbody>
    	  	<tfoot>
			    <tr>
			    	<td></td>
			    	<td></td>
			    	<td></td>
			    	<td><strong>Totle Price:</strong></td>
			      <td><strong>{{ $totalPrice }}</strong></td>
			      <td>
			      	<form action="{{ route('carts.postCheckout') }}" method="POST">
			      		@csrf
			      		{{ method_field('post') }}
				      	<button type="submit" class="btn btn-success">Checkout</button>
			      	</form>
			      </td>
			    </tr>
		  	</tfoot>
	</table>

	</div>{{-- end of col12 --}}
	@else
	<div class="col-md-12">
			<h2>NO ITEM IN CART</h2>
	</div>
	@endif
	</div>{{-- End of row --}}
@endsection





