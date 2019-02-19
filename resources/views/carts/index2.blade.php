@extends('layouts.app')

@section('content')
{{-- <div class="container"> --}}
    {{-- <div class="row justify-content-center"> --}}
        {{-- <div class="col-md-12"> --}}
        	{{-- <h1> Carts </h1> --}}
        	@if (Session::has('cart'))
				<div class="row justify-content-center">

					<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3 ">
						<ul class="list-group">
				        	@foreach ($products as $product)
								<li class="list-group-item">
									<span class="badge">{{ $product['qty'] }}</span>
									<strong>{{ $product['item']['name'] }}</strong>
									<span class="label label-success">{{ $product['price'] }}</span>
									<div class="btn-group">
										<button class="btn btn-primary btn-xs dropdown-toggle" 
												data-toggle ="dropdown">Actice 
												<span class="caret"></span>
										</button>
										<ul class="dropdown-menu">
											<li><a href="#">Reduce by one</a></li>
											<li><a href="#">reduce all</a></li>
										</ul>
									</div>
								</li>
				        	@endforeach
						</ul>
					</div>
				

					<div class="row">
						<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3 ">
							<strong>Totle:{{ $totalPrice }}</strong>
						</div>
					</div>
					<br>				
					<div class="row">
						<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3 ">
							<button type="button" class="btn btn-success">Checkout</button>	
						</div>
					</div>
		        	@else
						<div class="row">
							<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3 ">
								<h2>NO ITEM IN CART</h2>
							</div>
						</div>	

        		</div>
        	@endif
@endsection





