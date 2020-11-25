@extends('layouts.master')
@section('title','Admin | Categories')
@section('name','Categories')
@section('content')
<div class="col-12 mt-5">
  <div class="card">
    <div class="card-body">
      
      <h4 class="header-title">
      <a class="btn  font-weight-bold text-light" data-toggle="modal" data-target="#category" style="background-color: #881DFD;"><i class="fas fa-plus-square"></i>  Add Category</a></h4>
    </div>
  </div>
</div>
<div class="col-12 mt-5">
  <div class="card">
    <div class="card-body">
      
      <h4 class="header-title">List of Categories</h4>
      <div class="data-tables datatable-primary">
        <table id="dataTable2" class="text-center">
          <thead class="text-capitalize">
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $cat)
            <tr>
              <td>{{$cat->id}}</td>
              <td class="font-weight-bold">{{$cat->name}}</td>
              <td>
                @if($cat->status == '1')
                <span class="badge badge-pill badge-success">Available</span>
                @elseif($cat->status == '0')
                <span class="badge badge-pill badge-danger">Not Available</span>
                @endif
              </td>
              
              <td>
                <ul class="d-flex justify-content-center">
                  <li class="mr-3"><a href="#" class="text-info" data-toggle="modal" data-target="#catedit" data-id="{{$cat->id}}"data-catid="{{$cat->id}}" data-name="{{$cat->name}}"data-status="{{$cat->status}}"><i class="fa fa-edit"></i></a></li>
                  <li><a href="#" class="text-danger "data-toggle="modal" data-target="#modal" >
                  <i class="fas fa-trash"></i></a></li>
                </ul>
              </td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="category">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-light"style="background-color: #881DFD;">
        <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/catstore" method="POST">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          
          
          <div class="form-group">
            <label>Name:</label>
            <input type="text" class="form-control" name="name"  id="name">
          </div>
          
          
          
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn text-light"style="background-color: #881DFD;">Submit</button>
          
        </form>
      </div>
      
    </div>
  </div>
  
</div>
<div class="modal fade" id="catedit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/catupdate" method="POST">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <div class="form-group">
            <input type="hidden" name="id"class="form-control" id="id" >
          </div>
          
          <div class="form-group">
            <label>Id:</label>
            <input type="text" class="form-control" name="cat_id"  id="cat_id" readonly>
          </div>
          <div class="form-group">
            <label>Name:</label>
            <input type="text" class="form-control" name="name"  id="name">
          </div>
          <div class="form-group">
            <label>Edit Status:</label>
            <select class="custom-select" name="status"class="form-control" id="status"  required>
              
              
              <option value="1">Available</option>
              <option value="0">Not Available</option>
              
            </select>
          </div>
          <!-- <div class="form-group">
            <label>Multiple (.select2-purple)</label>
            <div class="select2-purple">
              <select class="select2" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                <option>Alabama</option>
                <option>Alaska</option>
                <option>California</option>
                <option>Delaware</option>
                <option>Tennessee</option>
                <option>Texas</option>
                <option>Washington</option>
              </select>
            </div>
          </div> -->
          
          
          
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn text-light bg-info">Submit</button>
          
        </form>
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
  $('#catedit').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var id = button.data('id')
var cat_id = button.data('catid')
var name = button.data('name')
var status = button.data('status')

var modal = $(this)
modal.find('.modal-body #id').val(id)
modal.find('.modal-body #cat_id').val(cat_id)
modal.find('.modal-body #name').val(name)
modal.find('.modal-body #status').val(status)
})
  $(function () {
//Initialize Select2 Elements
$('.select2').select2()
//Initialize Select2 Elements
$('.select2bs4').select2({
theme: 'bootstrap4'
})
})
</script>
@endsection
