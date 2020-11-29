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
						@foreach(App\Cart::first()->totalCarts() as $carts)
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
						
						
						<form id="main-contact-form" action="/storecheckout" class="contact-form row" name="contact-form" method="POST">
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
								
								<select class="form-control" name="payment_id" id="payments">
									<option selected>select a payment  mathod</option>
									@foreach($payments as $pay)
									<option value="{{$pay->id}}">{{$pay->payment_name}}</option>
									@endforeach
								</select>
							</div>
							
							@foreach($payments as $pay)
							
							@if($pay->id == "2")
							<div  id="payment{{$pay->id}}" class="hidden">
								<div class="col-md-12">
									<div class="alert alert-success">
										<h3>
										For Cash  in  there  is  nothing  necessary <br>
										<small>You  will  get  your  product  soon.</small>
										</h3>
									</div>
								</div>
							</div>
							@else
							<div  id="payment{{$pay->id}}" class="hidden">
								
								<div class="col-md-12">
									
									<div class="alert alert-success">
										<h4>{{$pay->payment_name}} Payment</h4>
										<p>
											<strong>{{$pay->payment_name}}</strong><br>
										</p>
										<h3>plese  send  the  bill  on  bkash  and  put  the  transection  id  bellow.</h3>
										
									</div>
								</div>
								
								
							</div>
							
							
							@endif
							@endforeach
							<div class="col-md-12">
								
								<div id="alert" class="alert alert-success hidden">
									<input type="text" name="transection_id" class="form-control hidden" id="transection_id">
								</div>
							</div>
							
							
							<div class="col-md-12">
								<label>Shipping Address:</label>
								<div class="order-message">
									
									
									
									<textarea name="shipping_address"  placeholder="Notes about your order, Special Notes for Delivery" rows="16">{{$user->address}}</textarea>
									
								</div>
							</div>
							<input type="hidden" name="total_ammount" class="form-control" required="required" value="{{$total_price + (int)App\Setting::first()->shipping_cost }}">
							
							
							
							
							
						</div>
					</div>
				</div>
				@endif
				@endforeach
			</div>
			@foreach(App\Cart::first()->totalCarts() as $carts)
			@if(Auth::user()->name == $carts->user->name)
			
			<input type="checkbox" name="product_name[]" class="form-control hidden"  value="{{$carts->product->name}}" checked>
			<input type="checkbox" name="product_quantity[]" class="form-control hidden"  value="{{$carts->product_quantity}}" checked>
			

			
 

			@endif
			@endforeach

			
			
			<section id="do_action">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							
							<div class="step-one text-center">
								<h2 class="heading">
								<button type="submit" class="btn btn-default update text-center" style="margin-top: 0px;">Submit</button></h2>
							</div>
							
							
						</form>
					</div>
				</div>
			</div>
			</section><!--/#do_action-->
			@endsection
			@section('js')
			<script type="text/javascript">
				$("#payments").change(function(){
					$payment_name = $("#payments").val();
					if($payment_name == "1"){
						$("#payment1").removeClass('hidden');
						$("#payment2").addClass('hidden');
						$("#payment3").addClass('hidden');
						$("#transection_id").removeClass('hidden');
						$("#alert").removeClass('hidden');
					}else if($payment_name == "2"){
						$("#payment2").removeClass('hidden');
						$("#payment1").addClass('hidden');
						$("#payment3").addClass('hidden');
						$("#transection_id").addClass('hidden');
						$("#alert").addClass('hidden');
					}else if($payment_name == "3"){
						$("#payment3").removeClass('hidden');
						$("#payment2").addClass('hidden');
						$("#payment1").addClass('hidden');
						$("#transection_id").removeClass('hidden');
						$("#alert").removeClass('hidden');
					}
				})
			</script>
			@endsection