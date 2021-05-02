@extends('layouts.frontend')
@section('css')

    <style>
        /* Absolute Center Spinner */
        .loading {
            position: fixed;
            z-index: 999;
            height: 2em;
            width: 2em;
            overflow: visible;
            margin: auto;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
        }

        /* Transparent Overlay */
        .loading:before {
            content: '';
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.3);
        }

        /* :not(:required) hides these rules from IE9 and below */
        .loading:not(:required) {
            /* hide "loading..." text */
            font: 0/0 a;
            color: transparent;
            text-shadow: none;
            background-color: transparent;
            border: 0;
        }

        .loading:not(:required):after {
            content: '';
            display: block;
            font-size: 10px;
            width: 1em;
            height: 1em;
            margin-top: -0.5em;
            -webkit-animation: spinner 1500ms infinite linear;
            -moz-animation: spinner 1500ms infinite linear;
            -ms-animation: spinner 1500ms infinite linear;
            -o-animation: spinner 1500ms infinite linear;
            animation: spinner 1500ms infinite linear;
            border-radius: 0.5em;
            -webkit-box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
            box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) -1.5em 0 0 0, rgba(0, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
        }

        /* Animation */

        @-webkit-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @-moz-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @-o-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
    </style>
@endsection
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

    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-3 sidebar">
                    <!-- ================================== TOP NAVIGATION ================================== -->

                    <!-- ================================== TOP NAVIGATION : END ================================== -->
                    <div class="sidebar-module-container">
                        <div class="sidebar-filter">
                            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                            <div class="sidebar-widget m-t-10 wow fadeInUp">
                                <h3 class="section-title">Category</h3>

                                <div class="sidebar-widget-body">
                                    <div class="accordion">
                                       @foreach($categoris as $cats)
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a href="#collapseOne{{$cats->id}}" data-toggle="collapse" class="accordion-toggle collapsed"> </a> <span><a href="{{route('category.product',['cat_sug'=>$cats->cat_slug,'cat_id'=>$cats->id,'cat_type'=>1])}}">{{$cats->category_name}}</a></span>
                                            </div>
                                            <!-- /.accordion-heading -->
                                            <div class="accordion-body collapse" id="collapseOne{{$cats->id}}" style="height: 0px;">
                                                <div class="accordion-inner">
                                                    <ul>
                                                        <!-- collapse inner -->
                                                        <?php
                                                        $sec_cat = \App\Models\sub_category::where('category_id',$cats->id)->get();
                                                        ?>
                                                        @foreach($sec_cat as $scats)
                                                        <li>
                                                            <div class="accordion-heading"> <a href="#collapseinnertwo{{$scats->id}}" data-toggle="collapse"
                                                                                               class="accordion-toggle collapsed accordion-inner-inner"> </a> <span><a
                                                                        href="{{route('category.product',['cat_sug'=>$scats->cat_slug,'cat_id'=>$scats->id,'cat_type'=>2])}}">{{$scats->category_name}}</a></span>
                                                            </div>
                                                            <div class="accordion-body collapse" id="collapseinnertwo{{$scats->id}}" style="height: 0px;">
                                                                <div class="accordion-inner">
                                                                    <ul>
                                                                        <?php
                                                                        $last_cat = \App\Models\sub_sub_category::where('sub_category_id',$scats->id)->get();
                                                                        ?>
                                                                            @foreach($last_cat as $lstcat)
                                                                        <li><a href="{{route('category.product',['cat_sug'=>$lstcat->cat_slug,'cat_id'=>$lstcat->id,'cat_type'=>3])}}">{{$lstcat->category_name}}</a></li>
                                                                            @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                        <!-- collapse inner end-->

                                                    </ul>
                                                </div>
                                                <!-- /.accordion-inner -->
                                            </div>
                                            <!-- /.accordion-body -->
                                        </div>
                                    @endforeach
                                        <!-- /.accordion-group -->


                                    </div>
                                    <!-- /.accordion -->
                                </div>

                                <!-- /.sidebar-widget-body -->
                            </div>






                            <!-- /.sidebar-widget -->
                            <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->
                        </div>
                        <!-- /.sidebar-filter -->
                    </div>
                    <!-- /.sidebar-module-container -->
                </div>
                <!-- /.sidebar -->
                <div class='col-md-9 m-t-10'>
                    <!-- ========================================== SECTION – HERO ========================================= -->

                    <div class="clearfix filters-container">
                        <div class="row">
                            <div class="col col-sm-6 col-md-6">
                                <div class="filter-tabs">
                                    <p>
                                        <button type="button" class="btn btn-primary totalprocount">{{$products_count}} Result</button>
                                    </p>
                                </div>
                                <!-- /.filter-tabs -->
                            </div>
                            <!-- /.col -->

                            <div class="col col-sm-12 col-md-6 text-right ">
                                <!-- <div class="col col-sm-3 col-md-6 "> -->
                                <!-- /.lbl-cnt -->
                                <!-- </div> -->
                                <!-- /.col -->
                                <!-- /.pagination-container -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product">
                                    <div class="row">
                                        @foreach($products as $product)
                                        <div class="col-sm-6 col-md-4 wow fadeInUp animated animated" style="visibility: visible; animation-name: fadeInUp;">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="{{route('product.details',['slug'=>$product->product_slug,'p_id'=>$product->id])}}">
                                                                <img src="{{asset($product->product_main_image)}}" style="height: 205px;" alt="">
                                                            </a>
                                                        </div>
                                                        <!-- /.image -->
                                                    </div>
                                                    <!-- /.product-image -->

                                                    <div class="product-info text-left">
                                                        <h3 class="name"><a href="{{route('product.details',['slug'=>$product->product_slug,'p_id'=>$product->id])}}">{{$product->product_name}}</a></h3>
                                                        <?php

                                                        $rating = \App\Models\product_review::where('product_id',$product->id)->sum('star');
                                                        $rating_count = \App\Models\product_review::where('product_id',$product->id)->count();
                                                        $rat = ($rating * 5  ) /100;
                                                        ?>
                                                        @if ($rating_count > 0)
                                                            @for ($i = 0; $i < $rat; $i++)
                                                                <span class="fa fa-star checked" style="color: orange"></span>
                                                            @endfor
                                                        @else
                                                            No Review
                                                        @endif
                                                        <div class="description"></div>
                                                        <div class="product-price">
                                                            <span class="price"> ${{$product->product_sell_price}} </span>
                                                            @if(!empty($product->product_old_price))
                                                                <span class="price-before-discount">${{$product->product_old_price}}</span>
                                                            @endif
                                                        </div>

                                                        <div class="button-holder fadeInDown-3">
                                                            <a href="{{route('product.details',['slug'=>$product->product_slug,'p_id'=>$product->id])}}" class="btn-lg btn btn-uppercase btn-primary shop-now-button btn-block">View Details</a>
                                                        </div>
                                                        <!-- /.product-price -->
                                                    </div>
                                                    <!-- /.product-info -->
                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">

                                                        </div>
                                                        <!-- /.action -->
                                                    </div>
                                                    <!-- /.cart -->
                                                </div>
                                                <!-- /.product -->

                                            </div>
                                            <!-- /.products -->
                                        </div>
                                        @endforeach


                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.category-product -->

                            </div>
                            <!-- /.tab-pane -->

                            <!-- /.tab-pane #list-container -->
                        </div>
                        <!-- /.tab-content -->
                        <div class="clearfix filters-container">
                            <div class="text-center">
                                <nav>
                                    {{$products->links()}}
                                </nav>

                                <!-- /.pagination-container -->
                            </div>
                            <!-- /.text-right -->

                        </div>
                        <!-- /.filters-container -->

                    </div>
                    <!-- /.search-result-container -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>



@endsection

