@extends('layouts.masterweb')
@section('title','Product Details | E-Shopper')
@section('content')
<section>
	<div class="container my-2">
		<div class="row ">
			<div class="col-sm-3 ">
				<div class="left-sidebar ">
					<h2>Category</h2>
					<div class="panel-group category-products" id="accordian"><!--category-productsr-->
					
					
					
					@foreach($categories as $cat)
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordian" href="#{{$cat->name}}">
								<span class="badge pull-right"><i class="fa fa-plus"></i></span>
								{{$cat->name}}
							</a>
							</h4>
						</div>
						<div id="{{$cat->name}}" class="panel-collapse collapse">
							<div class="panel-body">
								<ul>
									<li><a href="#"></a>{{$cat->name}}</li>
									<li><a href="#">Guess</a></li>
									<li><a href="#">Valentino</a></li>
									<li><a href="#">Dior</a></li>
									<li><a href="#">Versace</a></li>
								</ul>
							</div>
						</div>
					</div>
					@endforeach
					@foreach($categories as $cat)
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><a href="/categorydetails/{{$cat->id}}">{{$cat->name}}</a></h4>
						</div>
					</div>
					@endforeach
					
					</div><!--/category-products-->
					
					
					
					<div class="price-range"><!--price-range-->
					<h2>Price Range</h2>
					<div class="well text-center">
						<input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
						<b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
					</div>
					</div><!--/price-range-->
					
					
					
				</div>
			</div>
			<div class="col-sm-9 padding-right">
				<div class="product-details"><!--product-details-->
				<div class="col-sm-5">
					<div class="view-product">
						<img src="/storage/cover_images/{{$product->img1}}" id="imageBox" alt="" />
					</div>
					<div id="similar-product" class="carousel slide" data-ride="carousel">
						
						<!-- Wrapper for slides -->
						<div class="carousel-inner">
							<div class="item active ">
								<a href=""><img src="/storage/cover_images/{{$product->img2}}" alt="" onclick="myFunction(this)" style="height: 200px; width: 260px;"></a>
								
								
							</div>
							<div class="item  ">
								
								<a href=""><img src="/storage/cover_images/{{$product->img3}}" alt="" onclick="myFunction(this)" style="height: 200px; width: 260px;"></a>
								
							</div>
							<div class="item">
								<a href=""><img src="/storage/cover_images/{{$product->img4}}" alt="" onclick="myFunction(this)" style="height: 200px; width: 260px;"></a>
								
								
							</div>
							<div class="item">
								
								<a href=""><img src="/storage/cover_images/{{$product->img5}}" alt="" onclick="myFunction(this)" style="height: 200px; width: 260px;"></a>
								
							</div>
							
							
						</div>
						<!-- Controls -->
						<a class="left item-control" href="#similar-product" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a class="right item-control" href="#similar-product" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
				</div>
				<h4> <small></small></h4>
				
				
				
				
				<div class="col-sm-7">
					<div class="product-information"><!--/product-information-->
					<img src="images/product-details/new.jpg" class="newarrival" alt="" />
					<h2>{{$product->name}}</h2>
					<p>Web ID:{{$product->id}}</p>
					
					<span>
						<form action="/storecart" method="POST">
							{{ csrf_field() }}
							{{ method_field('PUT') }}
							<span>{{$product->price}}</span>
							<br>
							
							
							<div class="input-group plus-minus-input">
								<label>Quantity:</label>
								<button type="button" class="button hollow circle" data-quantity="minus" data-field="quantity">
								<i class="fa fa-minus" aria-hidden="true"></i>
								</button>
								<input class="input-group-field" type="number" name="quantity" value="1">
								<button type="button" class="button hollow circle" data-quantity="plus" data-field="quantity">
								<i class="fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>
							
							
							<!-- product qty -->
							<!-- Change the `data-field` of buttons and `name` of input field's for multiple plus minus buttons-->
							<!-- !product qty -->
							<br>
							<!--quantity-->
							
							<!--quantity-->
							
							
							
							<input type="hidden" class="form-control" name="product_id" value="{{$product->id}}">
							
							<button type="submit" class="btn btn-fefault cart">
							<i class="fa fa-shopping-cart"></i>
							Add to cart
							</button>
						</form>
					</span>

					

					<p><b>Rating: </b><span class="badge badge-pill badge-primary"> {{$new}} </span>  <i class="fas fa-star" style="color: #F39C12;"></i></p>
					
					
					
					<p><b>Availability:</b> @if($product->status == '1')
						<span class="badge badge-pill badge-success">Available</span>
						@elseif($product->status == '0')
						<span class="badge badge-pill badge-primary">Not Available</span>
						@endif
					</p>
					<p><b>Available Colors:</b>{{$product->color}}</p>
					@foreach($product->category as $prod)
					<p><b>Category:</b>{{$prod->name}}</p>
					@endforeach
					
					<p><b>Os:</b>{{$product->os}}</p>
					<p><b>Weight:</b>{{$product->weight}}</p>
					<p><b>Screen:</b>{{$product->screen}}</p>
					<p><b>Resolution:</b>{{$product->resolation}}</p>
					<p><b>Dimension:</b>{{$product->dimension}}</p>
					<p><b>Expandable:</b>{{$product->expandable}}</p>
					<p><b>RAM:</b>{{$product->RAM}}</p>
					<p><b>ROM:</b>{{$product->ROM}}</p>
					<p><b>Number of cores:</b>{{$product->number_of_cores}}</p>
					<p><b>SoC:</b>{{$product->SoC}}</p>
					<p><b>CPU:</b>{{$product->CPU}}</p>
					<p><b>GPU:</b>{{$product->GPU}}</p>
					<p><b>Featurues:</b>{{$product->featurues}}</p>
					<p><b>Video:</b>{{$product->vedio}}</p>
					<p><b>Primary:</b>{{$product->primary}}</p>
					<p><b>Secondary:</b>{{$product->secondary}}</p>
					<p><b>Battery:</b>{{$product->battery}}</p>
					<p><b>Charging:</b>{{$product->charging}}</p>
					<p><b>Wi-Fi:</b>{{$product->wifi}}</p>
					<p><b>Internet:</b>{{$product->internet}}</p>
					<p><b>USB:</b>{{$product->USB}}</p>
					<p><b>Bluetooth:</b>{{$product->bluetooth}}</p>
					<p><b>Radio:</b>{{$product->radio}}</p>
					<p><b>First arrival:</b>{{$product->first_arrival}}</p>
					<p><b>Manufactured By:</b>{{$product->manufacturedby}}</p>
					<p><b>SIM:</b>{{$product->SIM}}</p>
					<p><b>Other Features:</b>{{$product->other_features}}</p>
					<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
					</div><!--/product-information-->
				</div>
				</div><!--/product-details-->
			</div>
			<div class="response-area">
				<h2>{{ $product->ratings()->count() }} RESPONSES</h2>
				@foreach($product->ratings as $rating)
				<ul class="media-list">
					<li class="media">
						
						<a class="pull-left" href="#">
							<img class="media-object" src="{{asset('images/blog/user.png')}}" alt="" style="height: 100px; width: 100px;">
						</a>
						<div class="media-body">
							<ul class="sinlge-post-meta">
								<li><i class="fa fa-user"></i>{{$rating->user->name}}</li>
								<li><i class="fa fa-clock-o"></i>{{$rating->created_at->diffForHumans()}}</li>
							</ul>
							<p>{{$rating->comment}}</p>
							@if($rating->rating == 5)
							<label class="form-check-label px-3">
								<i class="fas fa-star" style="color: #F39C12;"></i>
								<i class="fas fa-star" style="color: #F39C12;"></i>
								<i class="fas fa-star" style="color: #F39C12;"></i>
								<i class="fas fa-star" style="color: #F39C12;"></i>
								<i class="fas fa-star" style="color: #F39C12;"></i>
							</label>
							@elseif($rating->rating == 4)
							
							<label class="form-check-label px-3">
								<i class="fas fa-star" style="color: #F39C12;"></i>
								<i class="fas fa-star" style="color: #F39C12;"></i>
								<i class="fas fa-star" style="color: #F39C12;"></i>
								<i class="fas fa-star" style="color: #F39C12;"></i>
							</label>
							@elseif($rating->rating == 3)
							<label class="form-check-label px-3">
								<i class="fas fa-star" style="color: #F39C12;"></i>
								<i class="fas fa-star" style="color: #F39C12;"></i>
								<i class="fas fa-star" style="color: #F39C12;"></i>
							</label>
							@elseif($rating->rating == 2)
							<label class="form-check-label px-3">
								<i class="fas fa-star" style="color: #F39C12;"></i>
								<i class="fas fa-star" style="color: #F39C12;"></i>
							</label>
							@elseif($rating->rating == 1)
							<label class="form-check-label px-3">
								<i class="fas fa-star" style="color: #F39C12;"></i>
							</label>
							
							@endif
							
						</div>
					</li>
					
					
				</ul>
				@endforeach
				</div><!--/Response-area-->
				<div class="category-tab shop-details-tab"><!--category-tab-->
				<div class="col-sm-12">
					<ul class="nav nav-tabs">
						<li><a href="#details" data-toggle="tab">Recomended Items</a></li>
						<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
					</ul>
				</div>
				<div class="tab-content">
					<div class="tab-pane fade" id="details" >
						<div class="col-md-12">
							<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner">
									<div class="item active">
										@foreach($products as $prod)
										
										<div class="col-sm-3">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo text-center">
														<img src="/storage/cover_images/{{$prod->img1}}" alt="" style="height: 150px; width: 100px;" />
														<h2>{{$prod->price}}</h2>
														<a href="/productdetails/{{$prod->id}}"><p>{{$prod->name}}</p></a>
													</div>
												</div>
											</div>
										</div>
										
										@endforeach
										
										
									</div>
									<div class="item">
										<div class="col-sm-3">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo text-center">
														<img src="images/home/recommend1.jpg" alt="" />
														<h2>$56</h2>
														<p>Easy Polo Black Edition</p>
														<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo text-center">
														<img src="images/home/recommend2.jpg" alt="" />
														<h2>$56</h2>
														<p>Easy Polo Black Edition</p>
														<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo text-center">
														<img src="images/home/recommend3.jpg" alt="" />
														<h2>$56</h2>
														<p>Easy Polo Black Edition</p>
														<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								</a>
								<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
									<i class="fa fa-angle-right"></i>
								</a>
							</div>
						</div>
					</div>
					
					
					
					<div class="tab-pane fade active in" id="reviews" >
						<div class="col-sm-12">
							
							
							
							
							
							<form action="/rating/{{$product->id}}" method="POST">
								{{ csrf_field() }}
								{{ method_field('PUT') }}
								
								
								<div class="row">
									<div class="col-sm-8">
										<div class="form-group">
											<label>Rating</label>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group pull-right">
											<div class="rateyo" id= "rating"></div>
											<span class='result'></span>
											<input type="hidden" name="rating">
										</div>
									</div>
									
								</div>
								
								
								
								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<p><b>Write Your Review</b></p>
											<textarea type="text" name="comment" class="" placeholder="Body of Post" id="exampleFormControlTextarea1" rows="4"></textarea>
										</div>
									</div>
								</div>
								<button class="btn btn-default pull-right">Review</button>
							</form>
						</div>
					</div>
					
					
				</div>
				</div><!--/category-tab-->
				
				
			</div>
		</div>
		
		
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
		$(function () {
		$(".rateyo").rateYo().on("rateyo.change", function (e, data) {
		var rating = data.rating;
		$(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
		$(this).parent().find('.result');
		$(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
		});
		});
		</script>
		@endsection