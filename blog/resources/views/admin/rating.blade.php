@extends('layouts.master')
@section('title','Admin | Reviews')
@section('name','Reviews')
@section('content')
<div class="col-12 mt-5">
  <div class="card">
    <div class="card-body">
      
      <h4 class="header-title">List of Reviews</h4>
      <div class="data-tables datatable-primary">
        <table id="dataTable2" class="text-center">
          <thead class="text-capitalize">
            <tr>
              <th>Id</th>
              <th>Name</th>

              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($ratings as $cat)
            <tr>
              <td>{{$cat->id}}</td>
              <td class="font-weight-bold">{{$cat->name}}</td>
              
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
@endsection
@section('js')
<script>
  $(function () {
$("#dataTable2").DataTable({
"responsive": true,
"autoWidth": false,
});
});
</script>
@endsection