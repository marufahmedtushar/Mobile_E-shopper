<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{asset('images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('images/ico/apple-touch-icon-57-precomposed.png')}}">
    </head><!--/head-->
    <body>
      <header id="header"><!--header-->
      <div class="header_top"><!--header_top-->
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="contactinfo">
              <ul class="nav nav-pills">
                <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="social-icons pull-right">
              <ul class="nav navbar-nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      </div><!--/header_top-->
      
      <div class="header-middle"><!--header-middle-->
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div class="logo pull-left">
              <a href="/"><img src="{{asset('images/home/logo.png')}}" alt="" /></a>
            </div>
            <div class="btn-group pull-right">
              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                USA
                <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="#">Canada</a></li>
                  <li><a href="#">UK</a></li>
                </ul>
              </div>
              
              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                DOLLAR
                <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="#">Canadian Dollar</a></li>
                  <li><a href="#">Pound</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="shop-menu pull-right">
              <ul class="nav navbar-nav">
                
                
                <!-- Authentication Links -->
                @guest
                <li class="nav-item"><a href="/" class="nav-link {{ '/' == request()->path() ? 'active' : '' }}" class="nav-link">Home</a></li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-lock"></i>{{ __('Login') }}</a>
                </li>
                @else
                <li class="nav-item"><a href="/" class="nav-link {{ '/' == request()->path() ? 'active' : '' }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="/cart" class="nav-link {{ 'cart' == request()->path() ? 'active' : '' }}" class="nav-link"><i class="fa fa-shopping-cart"></i> My Cart </a>
                </li>
                <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link {{ 'userprofile' == request()->path() ? 'active' : '' }} dropdown-toggle " href="/userprofile">
                    <i class="fa fa-user"></i>
                    {{ Auth::user()->name }}
                  </a>
                  <li class="nav-item">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>
                  </li>
                  
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                  </div>
                </li>
                @endguest
                
              </ul>
            </div>
          </div>
        </div>
      </div>
      </div><!--/header-middle-->
      
      <div class="header-bottom"><!--header-bottom-->
      <div class="container">
        <div class="row">

      <div class="col-sm-6">
        <div class="search_box">
          <input type="text" placeholder="Search"/>
        </div>
      </div>
    </div>
  </div>
  </div><!--/header-bottom-->
  </header><!--/header-->


  <div class="container">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
      {{ session('error') }}
    </div>
    @endif
  </div>
  
  @yield('content')


  <footer id="footer"><!--Footer-->
  <div class="footer-top ">
    <div class="container my-5">
      <div class="row">
        <div class="col-sm-2">
          <div class="companyinfo">
            <h2><span>e</span>-shopper</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
          </div>
        </div>
        <div class="col-sm-7">
          <div class="col-sm-3">
            <div class="video-gallery text-center">
              <a href="#">
                <div class="iframe-img">
                  <img src="{{asset('images/home/iframe1.png')}}" alt="" />
                </div>
                <div class="overlay-icon">
                  <i class="fa fa-play-circle-o"></i>
                </div>
              </a>
              <p>Circle of Hands</p>
              <h2>24 DEC 2014</h2>
            </div>
          </div>
          
          <div class="col-sm-3">
            <div class="video-gallery text-center">
              <a href="#">
                <div class="iframe-img">
                  <img src="{{asset('images/home/iframe2.png')}}" alt="" />
                </div>
                <div class="overlay-icon">
                  <i class="fa fa-play-circle-o"></i>
                </div>
              </a>
              <p>Circle of Hands</p>
              <h2>24 DEC 2014</h2>
            </div>
          </div>
          
          <div class="col-sm-3">
            <div class="video-gallery text-center">
              <a href="#">
                <div class="iframe-img">
                  <img src="{{asset('images/home/iframe3.png')}}" alt="" />
                </div>
                <div class="overlay-icon">
                  <i class="fa fa-play-circle-o"></i>
                </div>
              </a>
              <p>Circle of Hands</p>
              <h2>24 DEC 2014</h2>
            </div>
          </div>
          
          <div class="col-sm-3">
            <div class="video-gallery text-center">
              <a href="#">
                <div class="iframe-img">
                  <img src="{{asset('images/home/iframe4.png')}}" alt="" />
                </div>
                <div class="overlay-icon">
                  <i class="fa fa-play-circle-o"></i>
                </div>
              </a>
              <p>Circle of Hands</p>
              <h2>24 DEC 2014</h2>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="address">
            <img src="{{asset('images/home/map.png')}}" alt="" />
            <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="footer-widget">
    <div class="container">
      <div class="row">
        <div class="col-sm-2">
          <div class="single-widget">
            <h2>Service</h2>
            <ul class="nav nav-pills nav-stacked">
              <li><a href="#">Online Help</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Order Status</a></li>
              <li><a href="#">Change Location</a></li>
              <li><a href="#">FAQ’s</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="single-widget">
            <h2>Quock Shop</h2>
            <ul class="nav nav-pills nav-stacked">
              <li><a href="#">T-Shirt</a></li>
              <li><a href="#">Mens</a></li>
              <li><a href="#">Womens</a></li>
              <li><a href="#">Gift Cards</a></li>
              <li><a href="#">Shoes</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="single-widget">
            <h2>Policies</h2>
            <ul class="nav nav-pills nav-stacked">
              <li><a href="#">Terms of Use</a></li>
              <li><a href="#">Privecy Policy</a></li>
              <li><a href="#">Refund Policy</a></li>
              <li><a href="#">Billing System</a></li>
              <li><a href="#">Ticket System</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="single-widget">
            <h2>About Shopper</h2>
            <ul class="nav nav-pills nav-stacked">
              <li><a href="#">Company Information</a></li>
              <li><a href="#">Careers</a></li>
              <li><a href="#">Store Location</a></li>
              <li><a href="#">Affillate Program</a></li>
              <li><a href="#">Copyright</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-3 col-sm-offset-1">
          <div class="single-widget">
            <h2>About Shopper</h2>
            <form action="#" class="searchform">
              <input type="text" placeholder="Your email address" />
              <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
              <p>Get the most recent updates from <br />our site and be updated your self...</p>
            </form>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
        <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
      </div>
    </div>
  </div>
  
  </footer><!--/Footer-->
  
  
  <script src="{{asset('js/jquery.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
  <script src="{{asset('js/price-range.js')}}"></script>
  <script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
  
  @yield('js')
  
</body>
</html>