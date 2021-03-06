@extends('layouts.masterweb')
@section('title','Home | E-Shopper')
@section('content')


<section id="slider"><!--slider-->
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div id="slider-carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
          <li data-target="#slider-carousel" data-slide-to="1"></li>
          <li data-target="#slider-carousel" data-slide-to="2"></li>
        </ol>
        
        <div class="carousel-inner">
          <div class="item active">
            <div class="col-sm-6">
              <h1><span>E</span>-SHOPPER</h1>
              <h2></h2>
              <p> </p>
              <button type="button" class="btn btn-default get">Get it now</button>
            </div>
            <div class="col-sm-6">
              <img src="images/home/iphone1.jpeg" class="girl img-responsive" alt="" />
              <img src="images/home/pricing.png"  class="pricing" alt="" />
            </div>
          </div>
          <div class="item">
            <div class="col-sm-6">
              <h1><span>E</span>-SHOPPER</h1>
              <h2></h2>
              <p> </p>
              <button type="button" class="btn btn-default get">Get it now</button>
            </div>
            <div class="col-sm-6">
              <img src="images/home/iphone3.jpeg" class="girl img-responsive" alt="" />
              <img src="images/home/pricing.png"  class="pricing" alt="" />
            </div>
          </div>
          
          <div class="item">
            <div class="col-sm-6">
              <h1><span>E</span>-SHOPPER</h1>
              <h2></h2>
              <p> </p>
              <button type="button" class="btn btn-default get">Get it now</button>
            </div>
            <div class="col-sm-6">
              <img src="images/home/iphone4.jpeg" class="girl img-responsive" alt="" />
              <img src="images/home/pricing.png" class="pricing" alt="" />
            </div>
          </div>
          
        </div>
        
        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
          <i class="fa fa-angle-left"></i>
        </a>
        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
          <i class="fa fa-angle-right"></i>
        </a>
      </div>
      
    </div>
  </div>
</div>
</section><!--/slider-->

<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <div class="left-sidebar">
          <h2>Category</h2>
          <div class="panel-group category-products" id="accordian"><!--category-productsr-->
          
          
          
          <!-- @foreach($category as $cat)
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
          @endforeach -->
          @foreach($category as $cat)
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
          
          <div class="shipping text-center"><!--shipping-->
          <img src="images/home/shipping.jpg" alt="" />
          </div><!--/shipping-->
          
        </div>
      </div>
      
      <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Features Items</h2>
        @foreach($products as $product)
        <div class="col-sm-4">
          <div class="product-image-wrapper">
            <div class="single-products">
              <div class="productinfo text-center">
                <img src="/storage/cover_images/{{$product->img1}}" alt="" style="height: 250px; width: 200px;" />
                <h2>{{$product->price}}</h2>
                <a href="/productdetails/{{$product->id}}"><p>{{$product->name}}</p></a>
                <form action="/storecart" method="POST">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
                <input type="hidden" class="form-control" name="product_id" value="{{$product->id}}">
              
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
        
        
        
        </div><!--features_items-->
        <div class="container">
          {{$products->links()}}
        </div>
        
        
        
        
      </div>
    </div>
  </div>
</section>

@endsection