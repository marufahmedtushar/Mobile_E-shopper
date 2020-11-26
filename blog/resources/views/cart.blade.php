@extends('layouts.masterweb')
@section('title','E-Shopper | My Cart')
@section('content')
<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Cart Items</a></li>
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
							<form  action="/cartupdate/{{$carts->id}}" class="contact-form row" method="POST">
								{{ csrf_field() }}
								{{ method_field('PUT') }}
								<td class="cart_quantity">
									
									
									<div class="cart_quantity_button">
										
										
										<input type="number" class="cart_quantity_input" type="text" name="product_quantity" value="{{$carts->product_quantity}}" autocomplete="off" size="2" style="width: 70px;"><br><br>
										<button type="submit" class="btn btn-primary " style="margin-top: 0px;">Submit</button>
										
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
								<form action="/cartdelete/{{$carts->id}}" method="POST">
									{{ csrf_field() }}
									{{ method_field('delete') }}
									<button class="cart_quantity_delete" type="submit"><i class="fa fa-times"></i></button>
									
								</form>
								
							</td>
						</tr>
						
						
						@endif
						@endforeach
						
					</tbody>
				</table>
			</div>
			
		</div>
		</section> <!--/#cart_items-->
		
		@if($total_price == 0)
		<div class="container">
			<div class="step-one text-center">
				<h2 class="heading"><a class="btn btn-primary" href="/">Continue Shopping</a></h2>
			</div>
		</div>

		@else
		<section id="do_action">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="total_area">
							<ul>
								<li>Cart Sub Total <span>{{$total_price}} BDT</span></li>
								<li>Eco Tax <span>$2</span></li>
								<li>Shipping Cost <span>Free</span></li>
								<li>Total <span>{{$total_price}} BDT</span></li>
							</ul>
							<a class="btn btn-default update" href="/checkout">Check Out</a>
							
						</div>
					</div>
				</div>
			</div>
			</section><!--/#do_action-->
			@endif
			
			@endsection
			@section('js')
			<script>
			$('.value-plus').on('click', function(){
			var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
			divUpd.text(newVal);
			});
			$('.value-minus').on('click', function(){
			var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
			if(newVal>=1) divUpd.text(newVal);
			});
			function myFunction(smallImg)
			{
				var fullImg = document.getElementById("imageBox");
				fullImg.src = smallImg.src;
			}
			jQuery(document).ready(function(){
			// This button will increment the value
			$('[data-quantity="plus"]').click(function(e){
			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			fieldName = $(this).attr('data-field');
			// Get its current value
			var currentVal = parseInt($('input[name='+fieldName+']').val());
			// If is not undefined
			if (!isNaN(currentVal)) {
			// Increment
			$('input[name='+fieldName+']').val(currentVal + 1);
			} else {
			// Otherwise put a 0 there
			$('input[name='+fieldName+']').val(0);
			}
			});
			// This button will decrement the value till 0
			$('[data-quantity="minus"]').click(function(e) {
			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			fieldName = $(this).attr('data-field');
			// Get its current value
			var currentVal = parseInt($('input[name='+fieldName+']').val());
			// If it isn't undefined or its greater than 0
			if (!isNaN(currentVal) && currentVal > 0) {
			// Decrement one
			$('input[name='+fieldName+']').val(currentVal - 1);
			} else {
			// Otherwise put a 0 there
			$('input[name='+fieldName+']').val(0);
			}
			});
			});
			</script>
			@endsection