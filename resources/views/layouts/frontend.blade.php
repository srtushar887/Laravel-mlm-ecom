<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content=" Template, eCommerce">
    <meta name="robots" content="all">
    <link rel="shortcut icon" href="{{asset($gnl->site_icon)}}" />
    <title>{{$gnl->site_name}}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/main.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/blue.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/owl.transitions.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/animate.min.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/rateit.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/new-custom.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/new.responsive.css">

    @livewireStyles
    @yield('css')
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
          rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
<header class="header-style-1">
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                @guest
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li> <a href="{{route('login')}}"><span><i class="fas fa-sign-in-alt"></i></span>Login</a></li>
                        <li> <a href="{{route('register')}}"><span><i class="fas fa-user-plus"></i></span>Register</a></li>

                    </ul>
                </div>
                @else
                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown"
                                                                data-toggle="dropdown"><span class="value">Welcome! User </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li><a href="#">Logout</a></li>
                            </ul>
                        </li>

                    </ul>
                    <!-- /.list-unstyled -->
                </div>
                @endif
                <!-- /.cnt-cart -->
                <div class="offer-text">Save up to 12% everyday on all products</div>
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                <!-- <div class="logo"> <a href="home.html"> <img src="{{asset('assets/frontend/')}}/images/logo.png" alt="logo"> </a> </div> -->
                    <div class="logo"> <a href="home.html"> <img src="{{asset($gnl->site_logo)}}" alt="logo" style="height: 40px;width: 100%"> </a> </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    @yield('search')
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row carddv">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
                    <?php
                    $carts = \Gloudemans\Shoppingcart\Facades\Cart::content();
                    $counts = \Gloudemans\Shoppingcart\Facades\Cart::content()->count();
                    $sub = \Gloudemans\Shoppingcart\Facades\Cart::content()->sum('price');
                    ?>
                    <div class="dropdown dropdown-cart " id="carddiv"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="top-cart"> </div>

                                <div class="total-price-basket"> <span class="lbl">
                                        @if($counts > 1)
                                            {{$counts}} items /
                                        @else
                                            {{$counts}} item /
                                        @endif
                                    </span> <span class="total-price"> <span
                                            class="sign">$</span><span class="value">{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</span> </span> </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="cart-item product-summary">
                                    @if (count($carts) > 0)
                                        @foreach($carts as $caunt)
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <div class="image"> <a href="#"><img src="{{asset($caunt->options->image)}}" alt=""></a> </div>
                                                </div>
                                                <div class="col-xs-7">
                                                    <h3 class="name"><a href="#">{{$caunt->name}} </a></h3>
                                                    <div class="price">${{$caunt->subtotal()}}</div>
                                                    {{$caunt->pslug}}
                                                </div>
                                                <div class="col-xs-1 action"> <a href="{{route('cart.item.remove',$caunt->rowId)}}"><i class="fa fa-trash"></i></a> </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <p class="text-center">No Cart Product Available</p>
                                    @endif
                                </div>
                                <!-- /.cart-item -->
                                <div class="clearfix"></div>
                                <hr>
                                <div class="clearfix cart-total">
                                    <div class="pull-right"> <span class="text">Sub Total :</span><span class='price'>${{\Gloudemans\Shoppingcart\Facades\Cart::subTotal()}}</span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <a href="{{route('view.cart')}}" class="btn btn-upper btn-primary btn-block m-t-20">View Cart</a>
                                    <a href="{{route('checkout')}}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                </div>
                                <!-- /.cart-total-->

                            </li>
                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div>
                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed"
                            type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">

                                <li class="active"><a href="{{route('front')}}">Home</a></li>
                                <li><a href="{{route('all.product')}}">All Products</a></li>
                                <li><a href="{{route('about.us')}}">About Us</a></li>
                                <li><a href="{{route('blog')}}">Blog</a></li>
                                <li><a href="{{route('contact.us')}}">Contact</a></li>

                            </ul>
                            <!-- /.navbar-nav -->
                            <!-- <div class="clearfix"></div> -->
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>


@yield('front')
<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="footer color-bg">
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Contact Us</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class="toggle-footer" style="">
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i
                                            class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body">
                                    <p>Themesstock, 789 Main rd, Anytown, CA 12345 USA</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i
                                            class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body">
                                    <p>+(888) 123-4567<br>
                                        +(888) 456-7890</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i
                                            class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body"> <span><a href="#">lotus@themesstock.com</a></span> </div>
                            </li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">MY ACCOUNT</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#" title="Contact us">My Account</a></li>
                            <li><a href="#" title="About us">Order History</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">USEFUL LINK</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a title="Your Account" href="#">Home</a></li>
                            <li><a title="Information" href="#">About Us</a></li>
                            <li><a title="Addresses" href="#">Blog</a></li>
                            <li><a title="Addresses" href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">OUR CONDITIONS</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#" title="About us">Shipping Policy</a></li>
                            <li><a href="#" title="Blog">Return Policy</a></li>
                            <li><a href="#" title="Company">Privacy Ploicy</a></li>
                            <li><a href="#" title="Investor Relations">Terms & Conditions</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-padding social">
                <ul class="link">
                    <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>
                    <li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>
                    <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a></li>
                    <li class="rss pull-left"><a target="_blank" rel="nofollow" href="#" title="RSS"></a></li>
                    <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="#" title="PInterest"></a></li>
                    <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#" title="Linkedin"></a></li>
                    <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="#" title="Youtube"></a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 no-padding">
                <div class="clearfix payment-methods">
                    <ul>
                        <li><img src="{{asset('assets/frontend/')}}/images/payments/1.png" alt=""></li>
                        <li><img src="{{asset('assets/frontend/')}}/images/payments/2.png" alt=""></li>
                        <li><img src="{{asset('assets/frontend/')}}/images/payments/3.png" alt=""></li>
                        <li><img src="{{asset('assets/frontend/')}}/images/payments/4.png" alt=""></li>
                        <li><img src="{{asset('assets/frontend/')}}/images/payments/5.png" alt=""></li>
                    </ul>
                </div>
                <!-- /.payment-methods -->
            </div>
        </div>
    </div>
</footer>
<!-- ============================================================= FOOTER : END============================================================= -->



<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/jquery-1.11.1.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/bootstrap.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/bootstrap-hover-dropdown.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/owl.carousel.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/echo.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/jquery.easing-1.3.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/bootstrap-slider.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/jquery.rateit.min.js"></script>
<!-- <script type="text/javascript" src="{{asset('assets/frontend/')}}/js/lightbox.min.js"></script> -->
<script src="{{asset('assets/frontend/')}}/js/bootstrap-select.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/wow.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/scripts.js"></script>

@livewireScripts
@yield('js')


<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/35aac4d297.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('layouts.message')
</body>



</html>
