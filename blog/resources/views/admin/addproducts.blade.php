@extends('layouts.master')
@section('title','Admin | Add Products')
@section('name','Add Products')
@section('content')
<!-- Textual inputs start -->
<div class="row">
	<div class="col-md-8 ">
		<div class="card">
			<div class="card-body">
				<form action="/productstore" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
					
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<h5 class="modal-title">Software</h5>
								<label>Name:</label>
								<input type="text" class="form-control" name="name">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<h5 class="modal-title"></h5>
								<label>Os:</label>
								<input type="text" class="form-control" name="os">
							</div>
						</div>
						
					</div>
					<div>
						<h5>Design</h5>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									
									<label>weight:</label>
									<input type="text" class="form-control" name="weight">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>color:</label>
									<input type="text" class="form-control" name="color">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>screen:</label>
									<input type="text" class="form-control" name="screen">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>build:</label>
									<input type="text" class="form-control" name="build">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>resolution:</label>
									<input type="text" class="form-control" name="resolution">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>dimension:</label>
									<input type="text" class="form-control" name="dimension">
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
											<input type="text" class="form-control" name="price">
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
									<input type="text" class="form-control" name="expandable">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>RAM:</label>
									<input type="text" class="form-control" name="RAM">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>ROM:</label>
									<input type="text" class="form-control" name="ROM">
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
									<input type="text" class="form-control" name="numberofcores">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>SoC:</label>
									<input type="text" class="form-control" name="SoC">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>CPU:</label>
									<input type="text" class="form-control" name="CPU">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>GPU:</label>
									<input type="text" class="form-control" name="GPU">
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
						<h5>Photo</h5>
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
					<input type="text" class="form-control" name="featurues">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>video:</label>
					<input type="text" class="form-control" name="vedio">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>primary:</label>
					<input type="text" class="form-control" name="primary">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>secondary:</label>
					<input type="text" class="form-control" name="secondary">
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
					<input type="text" class="form-control" name="battery">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>charging:</label>
					<input type="text" class="form-control" name="charging">
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
					<input type="text" class="form-control" name="wifi">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>internet:</label>
					<input type="text" class="form-control" name="internet">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>USB:</label>
					<input type="text" class="form-control" name="USB">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>bluetooth:</label>
					<input type="text" class="form-control" name="bluetooth">
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
					<input type="text" class="form-control" name="radio" >
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
					<input type="text" class="form-control" name="sensors">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>other features:</label>
					<input type="text" class="form-control" name="other_features">
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
					<input class="form-control" type="month" value="2018-05" id="example-month-input" name="firstarrival">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Manufactured By:</label>
					<input type="text" class="form-control" name="manufacturedby">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>SIM:</label>
					<input type="text" class="form-control" name="SIM">
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
<!-- Textual inputs end -->
@endsection