@extends('layouts.master')
@section('title','Admin | Edit Products')
@section('name','Edit Products')
@section('content')
<div class="row">
	<div class="col-md-8 ">
		<div class="card">
			<div class="card-body">
				<form action="/updateproduct/{{$product->id}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
					
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<h5 class="modal-title">Software</h5>
								<label>Name:</label>
								<input type="text" class="form-control" name="name" value="{{$product->name}}">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<h5 class="modal-title"></h5>
								<label>Os:</label>
								<input type="text" class="form-control" name="os" value="{{$product->os}}">
							</div>
						</div>
						
					</div>
					<div>
						<h5>Design</h5>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									
									<label>weight:</label>
									<input type="text" class="form-control" name="weight" value="{{$product->weight}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>color:</label>
									<input type="text" class="form-control" name="color" value="{{$product->color}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>screen:</label>
									<input type="text" class="form-control" name="screen" value="{{$product->screen}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>build:</label>
									<input type="text" class="form-control" name="build" value="{{$product->build}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>resolution:</label>
									<input type="text" class="form-control" name="resolution"value="{{$product->resolution}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>dimension:</label>
									<input type="text" class="form-control" name="dimension"value="{{$product->dimension}}">
								</div>
							</div>
						</div>
					</div>
					
					
				</div>
			</div>
		</div>
		<div class="col-md-4 ">
			<div class="card">
				<div class="card-body">
					<div>
						<h5>Category</h5>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label></label>
									<select class="custom-select" name="categories"class="form-control">
										@foreach($product->category as $prod)
										
										<option value="{{$prod->id}}" selected>{{$prod->name}}</option>
										@endforeach
										
										@foreach($categories as $cat)
										<option value="{{$cat->id}}">{{$cat->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
					<div>
						
					</div>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<div>

								<h5 class="modal-title">Status</h5>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									
									<label></label>
									<select class="custom-select" name="status"class="form-control">
										@if($product->status == '1')
					<option value="1" selected>Available</option>
					@elseif($product->status == '0')
					<option value="0" selected>Not Available</option>
					@endif
									
										<option value="1">Available</option>
										<option value="0">Not Available</option>
									</select>
								</div>
							</div>
						</div>


								<h5>Price</h5>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label></label>
											<input type="text" class="form-control" name="price" value="{{$product->price}}">
										</div>
									</div>
								</div>

							</div>
							
						</div>
					</div>
				</div>
				
			</div>

			<div class="row mt-3">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<div>

								<h5 class="modal-title">Uploaded Photos</h5>
						<div class="row">
							<div class="col-md-12 product-image-thumbs">
						<div class="product-image-thumb active">
							<img src="/storage/cover_images/{{$product->img1}}" onclick="myFunction(this)" alt="Product Image">
						</div>
						<div class="product-image-thumb active">
							<img src="/storage/cover_images/{{$product->img2}}" onclick="myFunction(this)" alt="Product Image">
						</div>
						<div class="product-image-thumb" >
							<img src="/storage/cover_images/{{$product->img3}}" onclick="myFunction(this)" alt="Product Image">
						</div>
						<div class="product-image-thumb" >
							<img src="/storage/cover_images/{{$product->img4}}" onclick="myFunction(this)" alt="Product Image">
						</div>
						<div class="product-image-thumb" >
							<img src="/storage/cover_images/{{$product->img5}}" onclick="myFunction(this)" alt="Product Image">
						</div>
						
						
					</div>
						</div>


								

							</div>
							
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<div class="row mt-4">
		<div class="col-md-8 ">
			<div class="card">
				<div class="card-body">
					<div>
						<h5>Memory</h5>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									
									<label>expandable:</label>
									<input type="text" class="form-control" name="expandable" value="{{$product->expandable}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>RAM:</label>
									<input type="text" class="form-control" name="RAM" value="{{$product->RAM}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>ROM:</label>
									<input type="text" class="form-control" name="ROM" value="{{$product->ROM}}">
								</div>
							</div>
							
							
						</div>
					</div>
					<div>
						<h5 class="modal-title">Processor</h5>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									
									<label>number of cores:</label>
									<input type="text" class="form-control" name="numberofcores" value="{{$product->number_of_cores}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>SoC:</label>
									<input type="text" class="form-control" name="SoC" value="{{$product->SoC}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>CPU:</label>
									<input type="text" class="form-control" name="CPU" value="{{$product->CPU}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>GPU:</label>
									<input type="text" class="form-control" name="GPU" value="{{$product->GPU}}">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 ">
			<div class="card">
				<div class="card-body">
					<div>
						<h5>Upload Product's Photo</h5>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label></label>
									<div class="input-group mb-3">
										
										<div class="custom-file">
											<input type="file" class="custom-file-input" name="img1">
											<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
										</div>
									</div><div class="input-group mb-3">
									
									<div class="custom-file">
										<input type="file" class="custom-file-input" name="img2">
										<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
									</div>
								</div><div class="input-group mb-3">
								
								<div class="custom-file">
									<input type="file" class="custom-file-input" name="img3">
									<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
								</div>
							</div><div class="input-group mb-3">
							
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="img4">
								<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
							</div>
						</div><div class="input-group mb-3">
						
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="img5">
							<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
<div class="row mt-4">
<div class="col-md-12 ">
<div class="card">
<div class="card-body">
	<div>
		<h5 class="modal-title">Camera</h5>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					
					<label>featurues:</label>
					<input type="text" class="form-control" name="featurues" value="{{$product->featurues}}">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>video:</label>
					<input type="text" class="form-control" name="vedio" value="{{$product->vedio}}">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>primary:</label>
					<input type="text" class="form-control" name="primary" value="{{$product->primary}}">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>secondary:</label>
					<input type="text" class="form-control" name="secondary" value="{{$product->secondary}}">
				</div>
			</div>
			
			
		</div>
	</div>
	
	<div>
		<h5 class="modal-title">Battery</h5>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					
					<label>Battery:</label>
					<input type="text" class="form-control" name="battery" value="{{$product->battery}}">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>charging:</label>
					<input type="text" class="form-control" name="charging" value="{{$product->charging}}">
				</div>
			</div>
		</div>
		
		
	</div>
	<div>
		<h5 class="modal-title">Connectivity</h5>
		<div class="row">
			
			<div class="col-md-4">
				<div class="form-group">
					<label>Wi-Fi:</label>
					<input type="text" class="form-control" name="wifi" value="{{$product->wifi}}">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>internet:</label>
					<input type="text" class="form-control" name="internet" value="{{$product->internet}}">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>USB:</label>
					<input type="text" class="form-control" name="USB" value="{{$product->USB}}">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>bluetooth:</label>
					<input type="text" class="form-control" name="bluetooth" value="{{$product->bluetooth}}">
				</div>
			</div>
			
			
		</div>
	</div>
</div>
</div>
</div>
</div>
<div class="row mt-4">
<div class="col-md-12 ">
<div class="card">
<div class="card-body">
	<div>
		<h5 class="modal-title">Audio</h5>
		<div class="row">
			
			<div class="col-md-12">
				<div class="form-group">
					<label>radio:</label>
					<input type="text" class="form-control" name="radio" value="{{$product->radio}}">
				</div>
			</div>
			
			
		</div>
	</div>
	<div>
		<h5 class="modal-title">Others</h5>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>sensors:</label>
					<input type="text" class="form-control" name="sensors" value="{{$product->sensors}}">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>other features:</label>
					<input type="text" class="form-control" name="other_features" value="{{$product->other_features}}">
				</div>
			</div>
		</div>
	</div>
	<div>
		<h5 class="modal-title">Manufacturer</h5>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>first arrival:</label>
					<input class="form-control" type="month"  id="example-month-input" name="firstarrival" value="{{$product->first_arrival}}">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Manufactured By:</label>
					<input type="text" class="form-control" name="manufacturedby" value="{{$product->manufacturedby}}">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>SIM:</label>
					<input type="text" class="form-control" name="SIM" value="{{$product->SIM}}">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<button type="submit" class="btn text-light"style="background-color: #881DFD;">Submit</button>
				</div>
			</div>
			
			
		</div>
	</div>
	
	
	
	
	
	
</div>
</form>
</div>
</div>
</div>
@endsection
@section('js')
@endsection
