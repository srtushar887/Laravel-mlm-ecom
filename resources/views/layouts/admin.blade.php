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
                        <a class="dropdown-item" href="#"><i class="ri-wallet-2-line align-middle mr-1"></i> My Wallet</a>
                        <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right mt-1">11</span><i class="ri-settings-2-line align-middle mr-1"></i> Settings</a>
                        <a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle mr-1"></i> Lock screen</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="#"><i class="ri-shut-down-line align-middle mr-1 text-danger"></i> Logout</a>
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
                        <a href="{{route('admin.dashboard')}}" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('admin.general.settings')}}" class=" waves-effect">
                            <i class="ri-calendar-2-line"></i>
                            <span>General Settings</span>
                        </a>
                    </li>


                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-store-2-line"></i>
                            <span>Master Data</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{route('admin.category')}}">Category</a></li>
                            <li><a href="{{route('admin.subcategory')}}">Sub-Category</a></li>
                            <li><a href="{{route('admin.sub.subcategory')}}">Sub-Sub-Category</a></li>
                            <li><a href="{{route('admin.brand')}}">Brand</a></li>
                            <li><a href="{{route('admin.size')}}">Size</a></li>
                            <li><a href="{{route('admin.color')}}">Color</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{route('admin.product')}}" class=" waves-effect">
                            <i class="ri-calendar-2-line"></i>
                            <span>Product Management</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-store-2-line"></i>
                            <span>Order Management</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{route('admin.new.order')}}">New order</a></li>
                            <li><a href="{{route('admin.approved.order')}}">Approved</a></li>
                            <li><a href="{{route('admin.rejected.order')}}">Rejected</a></li>
                            <li><a href="{{route('admin.delivered.order')}}">Delivered</a></li>
                            <li><a href="aaaa">Canceled</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="{{route('admin.users')}}" class=" waves-effect">
                            <i class="ri-calendar-2-line"></i>
                            <span>User Management</span>
                        </a>
                    </li>


                    <li>
                        <a href="{{route('admin.users.account.activation')}}" class=" waves-effect">
                            <i class="ri-calendar-2-line"></i>
                            <span>User Account Activation</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('admin.users.account.verify')}}" class=" waves-effect">
                            <i class="ri-calendar-2-line"></i>
                            <span>Verify User Account</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('admin.product')}}" class=" waves-effect">
                            <i class="ri-calendar-2-line"></i>
                            <span>Report</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-store-2-line"></i>
                            <span>Frontend Control</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{route('admin.home.slider')}}">Home Slider</a></li>
                            <li><a href="{{route('admin.static.data')}}">Static Data</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-store-2-line"></i>
                            <span>Blog Management</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{route('admin.blog')}}">Blog</a></li>
                            <li><a href="pages-invoice.html">Blog Review</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="calendar.html" class=" waves-effect">
                            <i class="ri-calendar-2-line"></i>
                            <span>General Settings</span>
                        </a>
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

               @yield('admin')


            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <?php
                            $date = \Carbon\Carbon::now()->format('Y');
                        ?>
                       {{$date}} © {{$gnl->site_name}}.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right d-none d-sm-block">
                            Developed <i class="mdi mdi-heart text-danger"></i> by ALGOTOOLZ
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

<script src="{{asset('assets/admin/')}}/js/app.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
@yield('js')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('layouts.message')

</body>

<!-- Mirrored from themesdesign.in/nazox/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Feb 2021 12:49:05 GMT -->
</html>
