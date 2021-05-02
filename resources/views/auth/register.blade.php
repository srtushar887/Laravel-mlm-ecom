@extends('layouts.frontend')
@section('search')
    <div class="search-area">
        <form action="{{route('search.product')}}" method="get">
            @csrf
            <div class="control-group">
                <input class="search-field" name="search" placeholder="Search Product here..."  />
                <button type="submit" class="search-button"></button>
            </div>
        </form>
    </div>
@endsection
@section('front')

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('front')}}">Home</a></li>
                    <li class='active'>Login</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page ">
                <div class="row ">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 sign-in">
                        <h4 class="">Sign in</h4>
                        <p class="">Hello, Welcome to your account.</p>
                        @include('layouts.error')
                        <form class="register-form outer-top-xs" role="form" action="{{route('user.register.save')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Full Name<span>*</span></label>
                                <input type="text" name="name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" required>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" required>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
                                <input type="text" name="phone_number" class="form-control unicase-form-control text-input" id="exampleInputEmail1" required>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">NID Number <span>*</span></label>
                                <input type="text" name="nid_number" class="form-control unicase-form-control text-input" id="exampleInputEmail1" required>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">NID Front Image <span>*</span></label>
                                <input type="file" name="nid_frond_image" class="form-control unicase-form-control text-input" id="exampleInputEmail1" required>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">NID Back Image <span>*</span></label>
                                <input type="file" name="nid_back_image" class="form-control unicase-form-control text-input" id="exampleInputEmail1" required>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                                <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" required>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Confirm Password <span>*</span></label>
                                <input type="password" name="Confirm_password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" required>
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Register</button>
                        </form>
                    </div>
                    <!-- Sign-in -->
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->

        </div><!-- /.container -->
    </div>
@endsection
