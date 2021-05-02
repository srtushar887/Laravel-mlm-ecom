<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/nazox/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Feb 2021 12:47:03 GMT -->
<head>

    <meta charset="utf-8" />
    <title>{{$gnl->site_name}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset($gnl->site_icon)}}">

    <!-- jquery.vectormap css -->
    <link href="{{asset('assets/admin/')}}/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{asset('assets/admin/')}}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{asset('assets/admin/')}}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/admin/')}}/css/bootstrap.min.css"  rel="stylesheet" type="text/css" />



    <!-- Icons Css -->
    <link href="{{asset('assets/admin/')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/admin/')}}/css/app.min.css"  rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

    @livewireStyles

    @yield('css')
</head>

<body data-sidebar="dark">

<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset($gnl->site_logo)}}" alt="" style="height: 50px;width: 100%">
                                </span>
                        <span class="logo-lg">
                                    <img src="{{asset($gnl->site_logo)}}" alt="" style="height: 50px;width: 100%">
                                </span>
                    </a>

                    <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset($gnl->site_logo)}}" alt="" style="height: 50px;width: 100%">
                                </span>
                        <span class="logo-lg">
                                    <img src="{{asset($gnl->site_logo)}}" alt="" style="height: 50px;width: 100%">
                                </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                    <i class="ri-menu-2-line align-middle"></i>
                </button>

                <!-- App Search-->



            </div>

            <div class="d-flex">






                <div class="dropdown d-inline-block user-dropdown">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="https://www.computerhope.com/jargon/g/guest-user.jpg"
                             alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ml-1">{{Auth::user()->name}}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a class="dropdown-item" href="#"><i class="ri-user-line align-middle mr-1"></i> Profile</a>
                        <a class="dropdown-item" href="{{route('user.change.password')}}"><i class="ri-lock-unlock-line align-middle mr-1"></i> Change Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <i class="ri-shut-down-line align-middle mr-1 text-danger"></i> Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Menu</li>

                    <li>
                        <a href="{{route('dashboard')}}" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    @if (Auth::user()->account_type == 0)

                        <li>
                            <a href="{{route('user.created.user.list')}}" class="waves-effect">
                                <i class="ri-dashboard-line"></i>
                                <span>My Ref User List</span>
                            </a>
                        </li>
                    @endif


                    <li>
                        <a href="{{route('my.orders')}}" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>My Orders</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('user.products')}}" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.cart')}}" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>Cart</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.checkout.page')}}" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>Checkout</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('user.shipping.address')}}" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>Shipping Address</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.change.password')}}" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="ri-dashboard-line"></i>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>



                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                @yield('user')


            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> © Nazox.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right d-none d-sm-block">
                            Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{asset('assets/admin/')}}/libs/jquery/jquery.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/metismenu/metisMenu.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/simplebar/simplebar.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/node-waves/waves.min.js"></script>


<!-- Bootrstrap touchspin -->
<script src="{{asset('assets/admin/')}}/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>

{{--<script src="{{asset('assets/admin/')}}/js/pages/ecommerce-cart.init.js"></script>--}}


<script src="{{asset('assets/admin/')}}/js/app.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>


@livewireScripts

@yield('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('layouts.message')
</body>

<!-- Mirrored from themesdesign.in/nazox/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Feb 2021 12:49:05 GMT -->
</html>
