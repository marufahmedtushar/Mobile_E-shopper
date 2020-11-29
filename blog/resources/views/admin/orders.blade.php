@extends('layouts.master')
@section('title','Admin | Orders')
@section('name','Orders')
@section('content')



<div class="col-12 mt-5">
  <div class="card">
    <div class="card-body">
      
      <h4 class="header-title">List of Ordered Items</h4>
      <div class="data-tables datatable-primary">
        <table id="dataTable4" class="text-center">
          <thead class="text-capitalize">
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Ordered Item</th>
              <th>Quantity</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $cat)
            <tr>
              <td>{{$cat->id}}</td>
              <td class="font-weight-bold">{{$cat->user->name}}</td>
              <td class="font-weight-bold">
                @foreach( explode(",",$cat->product_name) as $row)

                    <span class="badge text-light font-weight-bold"style="background-color: #881DFD;">{{$row}}</span>

                    @endforeach
              </td>

              <td class="font-weight-bold">
                @foreach( explode(",",$cat->product_quantity) as $row)

                    <span class="badge text-light font-weight-bold"style="background-color: #881DFD;">{{$row}}</span>

                    @endforeach
              </td>
              
              <td>
                <ul class="d-flex justify-content-center">
                  <li class="mr-3"><a href="#" class="text-info" data-toggle="modal" data-target="#catedit" data-name="{{$cat->name}}"data-email="{{$cat->email}}"data-phone="{{$cat->phone}}"data-division="{{$cat->division}}"data-shippingaddress="{{$cat->shipping_address}}"data-totalammount="{{$cat->total_ammount}}"data-transactionid="{{$cat->transaction_id}}"data-productname="{{$cat->product_name}}"data-productquantity="{{$cat->product_quantity}}"data-paymentid="{{$cat->payment_id}}"><i class="fa fa-eye"></i></a></li>
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


 <!-- /.modal -->
<div class="modal fade" id="catedit">
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
                        <h5>Phone": <small class="text phone"></small></h5>
                        <h5>Division: <small class="text division"></small></h5>
                        <h5>Shipping Address: <small class="text shippingaddress"></small></h5>
                        <h5>Total Ammount: <small class="text totalammount"></small></h5>
                        <h5>Transaction Id: <small class="text transactionid"></small></h5>
                        <h5>Product Name: <small class="text product_name"></small></h5>
                        <h5>Product Quantity: <small class="text product_quantity"></small></h5>
                       <h5>Payment: <small class="text paymentid"></small></h5>
                       
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
$("#dataTable4").DataTable({
"responsive": true,
"autoWidth": false,
});
});
  $('#catedit').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal

var name = button.data('name')
var email = button.data('email')
var phone = button.data('phone')
var division = button.data('division')
var shippingaddress = button.data('shippingaddress')
var transactionid = button.data('transactionid')
var totalammount = button.data('totalammount')
var paymentid = button.data('paymentid')
var division = button.data('division')
var productname = button.data('productname')
var productquantity = button.data('productquantity')
var paymentid = button.data('paymentid')
if(paymentid == "1"){
var paymentid="bKash"
}else if(paymentid == "2"){
var paymentid="Cash on Delivery"
}else if(paymentid == "3"){
var paymentid="Rocket"
}
var modal = $(this)

modal.find('.modal-body #productname').val(productname)
modal.find('.modal-body #productquantity').val(productquantity)
modal.find('.modal-body .name').text(name)
modal.find('.modal-body .email').text(email)
modal.find('.modal-body .phone').text(phone)
modal.find('.modal-body .division').text(division)
modal.find('.modal-body .shippingaddress').text(shippingaddress)
modal.find('.modal-body .transactionid').text(transactionid)
modal.find('.modal-body .totalammount').text(totalammount)
modal.find('.modal-body .paymentid').text(paymentid)
modal.find('.modal-body .division').text(division)
modal.find('.modal-body .product_name').text(productname)
modal.find('.modal-body .product_quantity').text(productquantity)
modal.find('.modal-body .paymentid').text(paymentid)
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