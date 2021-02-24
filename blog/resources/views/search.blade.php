@extends('layouts.masterweb')
@section('title','Search | E-Shopper')
@section('content')



<section id="service" class="services-mf route">
    <div class="container">
        <div class="row">
           
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Search Result for...{{ request()->input('q') }}
            </h3>
            <p class="subtitle-a">
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">
         

        @foreach($search as $product)
        <div class="col-md-12 text-center">
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
      </div>

    </div>
  </section>


@endsection