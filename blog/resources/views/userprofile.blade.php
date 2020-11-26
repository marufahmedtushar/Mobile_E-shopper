@extends('layouts.masterweb')
@section('title','My Profile | E-Shopper')
@section('content')



	<section id="cart_items">
		<div class="container">


			
			

			<div class="register-req text-center">
				<h2 class="title text-center">My Profile</h2>
			</div><!--/register-req-->


			<div class="row">
					<div class="col-md-6">
						<div class="contact-info">
	    				<address>
	    					@foreach($users as $user)
	    					  @if(Auth::user()->name == $user->name)
	    					<p>Name: {{$user->name}}</p>
							<p>Mobile: {{$user->phone}}</p>
							<p>Email: {{$user->email}}</p>
							  
	    				</address>	
					</div>
				</div>

				<div class="col-md-6">
						<div class="contact-info">
	    				<address>
	    					
	    					<p>Birthday: {{$user->birthday}}</p>
							<p>Gender: {{$user->gender}}</p>
							<p>Division: {{$user->division}}</p>
							<p>Address: {{$user->address}}</p>
							  
	    				</address>	
					</div>
				</div>
			</div>


				

					

			<div class="row">
				<div class="col-md-12">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Update Profile</h2>
	    				
				    	<form id="main-contact-form" action="/userinfosave/{{$user->id}}" class="contact-form row" name="contact-form" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
				            <div class="form-group col-md-4">
				            	<label>Name:</label>
				                <input type="text" name="name" class="form-control" required="required" value="{{$user->name}}">
				            </div>
				            <div class="form-group col-md-4">
				            	<label>Email:</label>
				                <input type="email" name="email" class="form-control" required="required" value="{{$user->email}}">
				            </div>

				            <div class="form-group col-md-4">
				            	<label>Mobile:</label>
				                <input type="phone" name="phone" class="form-control" required="required" value="{{$user->phone}}">
				            </div>
				            <div class="form-group col-md-4">
				            	<label>Birthday:</label>
				                <input type="text" name="birthday"id="#" class="form-control" value="{{$user->birthday}}">
				            </div>
				            <div class="form-group col-md-4">
				            	<label>Gender:</label>
				                <select class="form-control" name="gender">
										<option selected>{{$user->gender}}</option>
										<option>Male</option>
										<option>Female</option>
										<option>Others</option>
									</select>
				            </div>

				            <div class="form-group col-md-4">
				            	<label>Division:</label>
				                

				                <select class="form-control" name="division">
										<option selected>{{$user->division}}</option>
										<option>Barisal</option>
										<option>Chittagong</option>
										<option>Dhaka</option>
										<option>Khulna</option>
										<option>Mymensingh</option>
										<option>Rajshahi</option>
										<option>Rangpur</option>
										<option>Sylhet</option>
									</select>
				            </div>
				            
				            <div class="form-group col-md-12">
				            	<label>Address:</label>
				                <textarea name="address" required="required" class="form-control" rows="8">{{$user->address}}</textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Update Changes">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    	</div>
	    	@endif
							@endforeach

			</div>
	</section> <!--/#cart_items-->

	@endsection

	@section('js')
	  <script >
      $('#datepicker').datetimepicker({
  timepicker: false,
  datepicker: true,
    format: 'd-m-y',
    value: '2020-01-01'
});
    </script>
    @endsection

