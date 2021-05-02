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
                    <li><a href="#">Home</a></li>
                    <li class='active'>All Products</li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page ">
                <div class="row ">
                    <div class="col-md-12">
                        <h3>Contact Form</h3>
                        <div class="row cform">
                            <div class="col-md-8">
                                <div class="well well-sm">
                                    <form action="#" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" name="visitor_name" placeholder="Enter name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email Address</label>
                                                    <input type="email" class="form-control" name="visitor_email"
                                                           placeholder="Enter email address">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Phone Number</label>
                                                    <input type="text" class="form-control" name="visitor_phone" placeholder="Enter phone number">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Message</label>
                                                    <textarea name="visitor_message" class="form-control" rows="9" cols="25"
                                                              placeholder="Enter message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="submit" value="Send Message" class="btn btn-primary pull-right"
                                                       name="form_contact">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
                                <address>
                                    ABC Steet, NewYork. </address>
                                <address>
                                    <strong>Phone:</strong><br>
                                    <span>123-456-7878</span>
                                </address>
                                <address>
                                    <strong>Email:</strong><br>
                                    <a href="mailto:info@yourwebsite.com"><span>info@yourwebsite.com</span></a>
                                </address>
                            </div>
                        </div>
                    </div>


                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
        </div><!-- /.container -->
    </div>
@endsection
