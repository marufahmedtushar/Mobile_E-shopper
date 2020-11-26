@extends('layouts.masterweb')
@section('title','E-Shopper | Checkout')
@section('content')
<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				
				<li class="active"><a href="#">Check out</a></li>
			</ol>
			</div><!--/breadcrums-->
			
			
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@php
						$total_price = 0;
						@endphp
						@foreach($cart as $carts)
						@if(Auth::user()->name == $carts->user->name)
						
						
						<tr>
							
							
							
							
							<td class="cart_product">
								<a href="/productdetails/{{$carts->product->id}}"><img class="img-thumbnail " src="/storage/cover_images/{{$carts->product->img1}}" alt="" style="height: 125px; width: 75px;"></a>
							</td>
							<td class="cart_description">
								<h4><a href="/productdetails/{{$carts->product->id}}">{{$carts->product->name}}</a></h4>
								
							</td>
							<td class="cart_price">
								<p>{{$carts->product->price}}</p>
							</td>
							<form  action="" class="contact-form row" method="POST">
								{{ csrf_field() }}
								{{ method_field('PUT') }}
								<td class="cart_quantity">
									
									
									<div class="cart_quantity_button">
										
										
										
										<button type="button" class="btn btn-primary " style="margin-top: 0px;">{{$carts->product_quantity}}</button>
										
									</div>
								</td>
							</form>
							<td class="cart_total">
								<p class="cart_total_price">
								{{ (int)$carts->product->price * (int)$carts->product_quantity }} BDT</p>
							</td>
							@php
							$total_price += (int)$carts->product->price * (int)$carts->product_quantity
							@endphp
							<td class="cart_delete">
								
								
							</td>
						</tr>
						
						
						@endif
						@endforeach
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>{{$total_price}} BDT</td>
									</tr>
									<tr>
										<td>Exo Tax</td>
										<td>$2</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>{{(int)App\Setting::first()->shipping_cost}} BDT</td>
									</tr>
									<tr>
										<td>Total</td>
										<td><span>{{$total_price + (int)App\Setting::first()->shipping_cost }} BDT</span></td>
									</tr>
								</table>
							</td>
						</tr>
						
					</tbody>
				</table>
			</div>
			<div class="step-one">
				<h2 class="heading text-center">Receiver Information</h2>
			</div>
			
				
			</div>
			</section> <!--/#cart_items-->
			@foreach($users as $user)
			@if(Auth::user()->name == $user->name)
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="signup-form">
							
							
							<form id="main-contact-form" action="" class="contact-form row" name="contact-form" method="POST">
								{{ csrf_field() }}
								{{ method_field('PUT') }}
								<div class="form-group col-md-6">
									<label>Name:</label>
									<input type="text" name="name" class="form-control" required="required" value="{{$user->name}}">
								</div>
								<div class="form-group col-md-6">
									<label>Email:</label>
									<input type="email" name="email" class="form-control" required="required" value="{{$user->email}}">
								</div>
								<div class="form-group col-md-6">
									<label>Mobile:</label>
									<input type="phone" name="phone" class="form-control" required="required" value="{{$user->phone}}">
								</div>
								
								
								<div class="form-group col-md-6">
									<label>Division:</label>
									
									<select class="form-control" name="division">
										<option selected>{{$user->division}}</option>
										<option>Barisal</option>
										<option>Chittagong</option>
										<option>Dhaka</option>
										<option>Khulna</option>
										<option>Mymensingh</option>
										<option>Rajshahi</option>
										<option>Rangpur</option>
										<option>Sylhet</option>
									</select>
								</div>
								

								<div class="form-group col-md-12">
									<label>Payment Method:</label>
									
									<select class="form-control" name="division">
										<option>bKash</option>
										<option>Rocket</option>
										<option>Cash on Delivery</option>
									</select>
								</div>
								
								
								<div class="col-md-12">
									<label>Shipping Address:</label>
									<div class="order-message">
										
										
										
										<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16">{{$user->address}}</textarea>
										
									</div>
								</div>

								<input type="text" name="total_price" class="form-control" required="required" value="{{$total_price + (int)App\Setting::first()->shipping_cost }}">

								@foreach($cart as $carts)
						@if(Auth::user()->name == $carts->user->name)

								<input type="hidden" name="product_id[]" class="form-control"  value="{{$carts->product->id}}">

								

								@endif

								@endforeach
								
								
								
							</form>
						</div>
					</div>
				</div>
				@endif
				@endforeach
			</div>
			
			<section id="do_action">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							
							<div class="step-one text-center">
								<h2 class="heading"><a class="btn btn-default update text-center" href="">Order Now</a></h2>
							</div>
							
							
							
						</div>
					</div>
				</div>
				</section><!--/#do_action-->
				@endsection