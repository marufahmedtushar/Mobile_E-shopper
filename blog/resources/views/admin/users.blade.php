@extends('layouts.master')
@section('title','Admin | Users')




@section('name','Users')
@section('content')

					
<!-- Primary table start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">List of Users</h4>
                <div class="data-tables datatable-primary">
                    <table id="dataTable2" class="text-center">
                        <thead class="text-capitalize">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>User Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td class="font-weight-bold">{{$user->name}}</td>
                                <td class="font-weight-bold">{{$user->email}}</td>
                                <td>
                                	@if($user->user_type == 'admin')
                                	<span class="badge badge-pill badge-info">{{$user->user_type}}</span>
                                	@elseif($user->user_type == 'user')
                                	<span class="badge badge-pill badge-primary">{{$user->user_type}}</span>@elseif($user->user_type == 'vendor')
                                	<span class="badge badge-pill badge-secondary">{{$user->user_type}}</span>
                                	@endif
                                </td>

                                
                                <td>
                                    <ul class="d-flex justify-content-center">
                                        <li class="mr-3"><a href="#" class="text-success" data-toggle="modal" data-target="#useredit" data-id="{{$user->id}}"data-userid="{{$user->id}}"data-name="{{$user->name}}"data-email="{{$user->email}}"data-birthday="{{$user->birthday}}"data-gender="{{$user->gender}}"data-division="{{$user->division}}"data-address="{{$user->address}}"data-usertype="{{$user->user_type}}"><i class="fa fa-edit"></i></a></li>

                                        <li><a href="#" class="text-danger "data-toggle="modal" data-target="#modal" data-userid="{{$user->id}}"data-name="{{$user->name}}">
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




  
              <div class="modal fade" id="useredit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLabel">User Role Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/userroleupdate" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
          <div class="form-group">
              <input type="hidden" name="id"class="form-control" id="id">
          </div>

          <div class="form-group">
                <label>Id:</label>
                <input type="text" class="form-control"  id="user_id" readonly>
          </div>

          <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control"  id="name" readonly>
          </div>
          <div class="form-group">
                <label>Email address:</label>
                <input type="email" class="form-control"  id="email" readonly>
          </div>

          <div class="form-group">
                <label>Birthday:</label>
                <input type="birthday" class="form-control"  id="birthday" readonly>
          </div>

          <div class="form-group">
                <label>Gender:</label>
                <input type="gender" class="form-control"  id="gender" readonly>
          </div>

          <div class="form-group">
                <label>Division:</label>
                <input type="division" class="form-control"  id="division" readonly>
          </div>

          <div class="form-group">
                <label>Address:</label>
                <input type="address" class="form-control"  id="address" readonly>
          </div>

          <div class="form-group">
                <label>User Type :</label>
                <select class="custom-select" name="user_type"class="form-control" id="user_type">
                      <option value="admin">admin</option>
                      <option value="user">user</option>
                      <option value="vendor">vendor</option>
                </select>
          </div>
          
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-success toastrDefaultSuccess">Save Changes</button>
      
        </form>
      </div>
      
    </div>
  </div>

 
</div>



 @foreach($users as $user)

<div class="modal  fade" id="modal">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header bg-danger">
              <h4 class="modal-title">Delete User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/deleteuser/{{$user->id}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <div class="modal-body">
                  <p>Are  You  Sure  to  Delete This User??</p>
                  <input type="hidden" name="user_id" id="user_id">

                  <div class="form-group">
                    <input type="text" class="form-control"  id="name" style="border:3px solid #ffffff;border-radius:10px;">
                </div>
                </div>
                <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <button class="btn btn-danger btn-sm toastrDefaultDelete">Delete </button>
            </div>
            </form>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      @endforeach

                    <!-- Primary table end -->
@endsection

@section('js')
<script>
	$(function () {
    $("#dataTable2").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });


	$('#useredit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') 
  var user_id = button.data('userid') 
  var name = button.data('name') 
  var email = button.data('email') 
  var birthday = button.data('birthday') 
  var gender = button.data('gender') 
  var division = button.data('division') 
  var address = button.data('address') 
  var user_type = button.data('usertype') 
  var modal = $(this)
  modal.find('.modal-body #id').val(id)
  modal.find('.modal-body #user_id').val(user_id)
  modal.find('.modal-body #name').val(name)
  modal.find('.modal-body #email').val(email)
  modal.find('.modal-body #birthday').val(birthday)
  modal.find('.modal-body #gender').val(gender)
  modal.find('.modal-body #division').val(division)
  modal.find('.modal-body #address').val(address)
  modal.find('.modal-body #user_type').val(user_type)
})

$('#modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var user_id = button.data('userid') 
  var name = button.data('name') 
  var modal = $(this)
  modal.find('.modal-body #user_id').val(user_id)
  modal.find('.modal-body #name').val(name)
})
</script>
@endsection