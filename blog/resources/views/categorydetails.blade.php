@extends('layouts.masterweb')
@section('title','Category Details | E-Shopper')
@section('content')


  <section>
  	<div class="container ">
	<div class="row ">
		<div class="col-md-12 ">
			<div class=" text-center "><!--shipping-->
			<img src="{{asset('images/home/lt.jpg')}}" alt="" />
			</div><!--/shipping-->
		</div>
	</div>
</div>
    <div class="container my-2">
      <div class="row ">
      	<div class="col-sm-3 ">
          <div class="left-sidebar ">
            <h2>Category</h2>
            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            
            
            
            @foreach($categories as $cat)
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordian" href="#{{$cat->name}}">
                  <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                  {{$cat->name}}
                </a>
                </h4>
              </div>
              <div id="{{$cat->name}}" class="panel-collapse collapse">
                <div class="panel-body">
                  <ul>
                    <li><a href="#"></a>{{$cat->name}}</li>
                    <li><a href="#">Guess</a></li>
                    <li><a href="#">Valentino</a></li>
                    <li><a href="#">Dior</a></li>
                    <li><a href="#">Versace</a></li>
                  </ul>
                </div>
              </div>
            </div>
            @endforeach
            @foreach($categories as $cat)
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"><a href="/categorydetails/{{$cat->id}}">{{$cat->name}}</a></h4>
              </div>
            </div>
            @endforeach
            
            </div><!--/category-products-->
            
            
            
            <div class="price-range"><!--price-range-->
            <h2>Price Range</h2>
            <div class="well text-center">
              <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
              <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
            </div>
            </div><!--/price-range-->
            
            
            
          </div>
        </div>
<div class="col-sm-9 padding-right">
          <div class="features_items"><!--features_items-->
          <h2 class="title text-center">Features Items</h2>
@foreach($category->products as $cat)


<div class="col-sm-4">
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class="productinfo text-center">
                  <img src="/storage/cover_images/{{$cat->img1}}" alt="" style="height: 250px; width: 200px;" />
                  <h2>{{$cat->price}}</h2>
                  <a href="/productdetails/{{$cat->id}}"><p>{{$cat->name}}</p></a>
                  
                  <form action="/storecart" method="POST">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
                <input type="hidden" class="form-control" name="product_id" value="{{$cat->id}}">
              
              <button type="submit" class="btn btn-fefault cart">
              <i class="fa fa-shopping-cart"></i>
              Add to cart
              </button>
            </form>
                </div>
                
              </div>
            </div>
          </div>

@endforeach
      </div>
  </div>
</div>
</div>


@endsection