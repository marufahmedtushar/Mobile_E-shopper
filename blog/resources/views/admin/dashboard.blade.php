@extends('layouts.master')
@section('title','Admin | Dashboard')




@section('name','Dashboard')
@section('content')

<div class="main-content-inner">
                <div class="row">
                    <!-- seo fact area start -->
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-4 mt-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg1">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="fas fa-user"></i> Total Users</div>
                                            <h2>{{$totalusers}}</h2>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            
                            <div class="col-md-4 mt-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="fas fa-tags"></i>Total Categories</div>
                                            <h2>{{$totalcategories}}</h2>
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4 mt-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg3">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="fas fa-cubes"></i> Total Products</div>
                                            <h2>{{$totalproducts}}</h2>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mt-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg4">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="fas fa-cart-arrow-down"></i> Total Order</div>
                                            <h2>{{$totalorder}}</h2>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mt-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg1">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="fas fa-star"></i> Total Reviews</div>
                                            <h2>{{$totalreviews}}</h2>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- seo fact area end -->
                    
                    
                    
                    
                    
                    
                </div>
            </div>
        </div>
        <!-- main content area end -->
@endsection
