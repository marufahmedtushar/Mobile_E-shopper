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
              <th>Coment</th>
              <th>Rated Device</th>
              <th>Rating</th>

              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($ratings as $rat)
            <tr>
              <td>{{$rat->id}}</td>
              <td class="font-weight-bold">{{$rat->comment}}</td>
              <td class="font-weight-bold">{{$rat->product->name}}</td>
              <td class="font-weight-bold">{{$rat->rating}}</td>
              
              <td>
                <ul class="d-flex justify-content-center">
                  <li class="mr-3"><a href="#" class="text-info" data-toggle="modal" data-target="#ratview" data-id="{{$rat->id}}"data-ratid="{{$rat->id}}" data-name="{{$rat->user->name}}"data-email="{{$rat->user->email}}"data-rateddevice="{{$rat->product->name}}"data-rating="{{$rat->rating}}"data-comment="{{$rat->comment}}" ><i class="fa fa-eye"></i></a></li>
                  <li><a href="#" class="text-danger "data-toggle="modal" data-target="#danger" data-ratid="{{$rat->id}}" data-name="{{$rat->comment}}" >
                  <i class="fas fa-trash"></i></a></li>
                </ul>
              </td>
            </tr>

            <div class="modal  fade" id="danger">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header bg-danger">
                    <h4 class="modal-title">Delete Review</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="/deleterating/{{$rat->id}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <div class="modal-body">
                      <p>Are  You  Sure  to  Delete This Review</p>
                      <input type="hidden" name="rat_id" id="rat_id">
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

<!-- /.modal -->
<div class="modal fade" id="ratview">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12 mt-5">
            <div class="card">
              <div class="card-body"style="border:3px solid #CDCCE7;border-radius:10px;padding:5px;">
                <h4 class="header-title"></h4>
                <div id="" class="">
                  <div class="card">
                    
                    
                      <div class="card-body">
                        <h5>Name: <small class="text name"></small></h5>
                        <h5>Email: <small class="text email"></small></h5>
                        <h5>Rated Device": <small class="text rateddevice"></small></h5>
                        <h5>Rating: <small class="text rating"></small></h5>
                        <h5>Comment: <small class="text comment"></small></h5>
                        
                       
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

  $('#ratview').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal

var name = button.data('name')
var email = button.data('email')
var rateddevice = button.data('rateddevice')
var rating = button.data('rating')
var comment = button.data('comment')
var transactionid = button.data('transactionid')
var totalammount = button.data('totalammount')
var paymentid = button.data('paymentid')
var division = button.data('division')
var productname = button.data('productname')
var productquantity = button.data('productquantity')
var paymentid = button.data('paymentid')

var modal = $(this)

modal.find('.modal-body #productname').val(productname)
modal.find('.modal-body #productquantity').val(productquantity)
modal.find('.modal-body .name').text(name)
modal.find('.modal-body .email').text(email)
modal.find('.modal-body .rateddevice').text(rateddevice)
modal.find('.modal-body .rating').text(rating)
modal.find('.modal-body .comment').text(comment)
modal.find('.modal-body .transactionid').text(transactionid)
modal.find('.modal-body .totalammount').text(totalammount)
modal.find('.modal-body .paymentid').text(paymentid)
modal.find('.modal-body .division').text(division)
modal.find('.modal-body .product_name').text(productname)
modal.find('.modal-body .product_quantity').text(productquantity)
modal.find('.modal-body .paymentid').text(paymentid)
})


  $('#danger').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var rat_id = button.data('ratid')
var name = button.data('name')
var modal = $(this)
modal.find('.modal-body #rat_id').val(rat_id)
modal.find('.modal-body #name').val(name)
})
</script>
@endsection