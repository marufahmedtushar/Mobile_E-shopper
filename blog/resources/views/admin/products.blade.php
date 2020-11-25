@extends('layouts.master')
@section('title','Admin | Products')
@section('name','Products')
@section('content')
<div class="col-12 mt-5">
	<div class="card">
		<div class="card-body">
			<h4 class="header-title">
			<a class="btn  font-weight-bold text-light" href="/addproducts" style="background-color: #881DFD;"><i class="fas fa-plus-square"></i>  Add Product</a></h4>
		</div>
	</div>
</div>
<div class="col-12 mt-5">
	<div class="card">
		<div class="card-body">
			<h4 class="header-title"></h4>
			<div class="data-tables datatable-primary">
				<table id="dataTable2" class="text-center">
					<thead class="text-capitalize">
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Price</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $prod)
						<tr>
							<td>{{$prod->id}}</td>
							<td class="font-weight-bold">{{$prod->name}}</td>
							<td class="font-weight-bold">{{$prod->price}}</td>
							<td>
								@if($prod->status == '1')
								<span class="badge badge-pill badge-success">Available</span>
								@elseif($prod->status == '0')
								<span class="badge badge-pill badge-primary">Not Available</span>
								@endif
							</td>
							
							<td>
								<ul class="d-flex justify-content-center">
									<li class="mr-3"><a href="/viewproduct/{{$prod->id}}" class="text-info"><i class="fa fa-eye"></i></a></li>
									
									<li class="mr-3"><a href="/editproduct/{{$prod->id}}" class="text-success"><i class="fa fa-edit"></i></a></li>
									<li><a href="#" class="text-danger "data-toggle="modal" data-target="#modal-danger" data-productid="{{$prod->id}}" data-name="{{$prod->name}}">
									<i class="fas fa-trash"></i></a></li>
								</ul>
							</td>
						</tr>
						<div class="modal  fade" id="modal-danger">
							<div class="modal-dialog modal-sm">
								<div class="modal-content">
									<div class="modal-header bg-danger">
										<h4 class="modal-title">Delete Product</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form action="/deleteproduct/{{$prod->id}}" method="POST">
										{{ csrf_field() }}
										{{ method_field('delete') }}
										<div class="modal-body">
											<p>Are  You  Sure  to  Delete This Product Named</p>
											<input type="hidden" name="product_id" id="product_id">
											<div class="form-group">
												<input type="text" class="form-control"  id="name" style="border:3px solid #ffffff;border-radius:10px;">
											</div>
										</div>
										<div class="modal-footer justify-content-between">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											<button class="btn btn-danger btn-sm toastrBillDelete">Delete </button>
										</div>
									</form>
									
								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						@endforeach
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
<script>
$(function () {
$("#dataTable2").DataTable({
"responsive": true,
"autoWidth": false,
});
});
$('#modal-danger').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var product_id = button.data('productid')
var name = button.data('name')
var modal = $(this)
modal.find('.modal-body #product_id').val(product_id)
modal.find('.modal-body #name').val(name)
})
</script>
@endsection