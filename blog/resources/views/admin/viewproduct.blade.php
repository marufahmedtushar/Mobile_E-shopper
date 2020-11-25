@extends('layouts.master')
@section('title','Admin | Categories')
@section('name','Categories')
@section('content')
<section class="content">
	<!-- Default box -->
	<div class="card card-solid">
		<div class="card-body">
			<div class="row">
				<div class="col-12 col-sm-6">
					<h3 class="d-inline-block d-sm-none">{{$product->name}}</h3>
					<div class="col-12">
						<img src="/storage/cover_images/{{$product->img1}}" id="imageBox" class="product-image" alt="Product Image">
					</div>
					<div class="col-12 product-image-thumbs">
						<div class="product-image-thumb active">
							<img src="/storage/cover_images/{{$product->img1}}" onclick="myFunction(this)" alt="Product Image">
						</div>
						<div class="product-image-thumb" >
							<img src="/storage/cover_images/{{$product->img2}}" onclick="myFunction(this)" alt="Product Image">
						</div>
						<div class="product-image-thumb" >
							<img src="/storage/cover_images/{{$product->img3}}" onclick="myFunction(this)" alt="Product Image">
						</div>
						<div class="product-image-thumb" >
							<img src="/storage/cover_images/{{$product->img4}}" onclick="myFunction(this)" alt="Product Image">
						</div>
						
						
					</div>
				</div>
				<div class="col-12 col-sm-6">
					<h3 class="my-3 name" id="name">{{$product->name}}</h3>
					<hr>
					<h4>Available Colors: <small>{{$product->color}}</small></h4>
					
					@foreach($product->category as $prod)
					<h4 class="mt-3">Category: <small>{{$prod->name}}</small></h4>
					@endforeach
					<h4 class="mt-3">Status:
					<small>
					
					@if($product->status == '1')
					<span class="badge badge-pill badge-success">Available</span>
					@elseif($product->status == '0')
					<span class="badge badge-pill badge-primary">Not Available</span>
					@endif
					</small>
					</h4>
					
					
					<div class="bg-gray py-2 px-3 mt-4">
						<h2 class="mb-0">
						{{$product->price}}
						</h2>
						
					</div>

					<!-- accordion style 4 start -->
					<div class="col-lg-12 mt-5">
						<div class="card">
							<div class="card-body"style="border:3px solid #CDCCE7;border-radius:10px;padding:5px;">
								<h4 class="header-title"></h4>
								<div id="accordion4" class="according accordion-s3 gradiant-bg">
									<div class="card">
										<div class="card-header">
											<a class="card-link" data-toggle="collapse" href="#accordion41">More Details</a>
										</div>
										<div id="accordion41" class="collapse show" data-parent="#accordion4">
											<div class="card-body">
												
												<h5>Os: <small>{{$product->os}}</small></h5>
												<h5>Weight: <small>{{$product->weight}}</small></h5>
												<h5>Screen: <small>{{$product->screen}}</small></h5>
												<h5>Build: <small>{{$product->build}}</small></h5>
												<h5>Resolution: <small>{{$product->resolution}}</small></h5>
												<h5>Dimension: <small>{{$product->dimension}}</small></h5>
												<h5>Expandable: <small>{{$product->expandable}}</small></h5>
												<h5>RAM: <small>{{$product->RAM}}</small></h5>
												<h5>ROM: <small>{{$product->ROM}}</small></h5>
												<h5>Number of cores: <small>{{$product->number_of_cores}}</small></h5>
												<h5>SoC: <small>{{$product->SoC}}</small></h5>
												<h5>CPU: <small>{{$product->CPU}}</small></h5>
												<h5>GPU: <small>{{$product->GPU}}</small></h5>
												<h5>Featurues: <small>{{$product->featurues}}</small></h5>
												<h5>Video: <small>{{$product->vedio}}</small></h5>
												<h5>Primary: <small>{{$product->primary}}</small></h5>
												<h5>Secondary: <small>{{$product->secondary}}</small></h5>
												<h5>Battery: <small>{{$product->battery}}</small></h5>
												<h5>Charging: <small>{{$product->charging}}</small></h5>
												<h5>Wi-Fi: <small>{{$product->wifi}}</small></h5>
												<h5>Internet: <small>{{$product->internet}}</small></h5>
												<h5>USB: <small>{{$product->USB}}</small></h5>
												<h5>Bluetooth: <small>{{$product->bluetooth}}</small></h5>
												<h5>Radio: <small>{{$product->radio}}</small></h5>
												<h5>First arrival: <small>{{$product->first_arrival}}</small></h5>
												<h5>Manufactured By: <small>{{$product->manufacturedby}}</small></h5>
												<h5>SIM: <small>{{$product->SIM}}</small></h5>
											</div>
										</div>
									</div>
									
									
								</div>
							</div>
						</div>
					</div>
					<!-- accordion style 4 end -->
					
				</div>
			</div>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</section>
@endsection
@section('js')
<script>
	function myFunction(smallImg)
	{
		var fullImg = document.getElementById("imageBox");
		fullImg.src = smallImg.src;
	}
</script>
@endsection