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

    <!-- ============================================== HEADER : END ============================================== -->
    <div class="body-content outer-top-vs" id="top-banner-and-menu">
        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 sidebar ">
                    <!-- ================================== TOP NAVIGATION ================================== -->
                    <div class="side-menu animate-dropdown">
                        <div class="head"><i class="icon fa fa-bars"></i> Categories</div>
                        <nav class="yamm">
                            <ul class="nav">
                                <!-- menu hover for submenu -->



                                <div class="nav">
                                    @foreach($categories as $mcat)
                                    <li>
                                        <a href="{{route('category.product',['cat_sug'=>$mcat->cat_slug,'cat_id'=>$mcat->id,'cat_type'=>1])}}" class="dropdown-toggle" data-hover="dropdown" aria-haspopup="true" aria-hidden="true">
                                            <i class="icon fa fa-shopping-bag"></i>{{$mcat->category_name}}</a>
                                        <ul class="dropdown-menu">
                                            <div class="nav">
                                                <?php
                                                $sec_cat = \App\Models\sub_category::where('category_id',$mcat->id)->get();
                                                ?>
                                                    @foreach($sec_cat as $scat)
                                                <li class="dropdown-submenu">
                                                    <a href="{{route('category.product',['cat_sug'=>$scat->cat_slug,'cat_id'=>$scat->id,'cat_type'=>2])}}" class="dropdown-toggle" aria-haspopup="true" aria-hidden="true"> {{$scat->category_name}}
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <?php
                                                        $last_cat = \App\Models\sub_sub_category::where('sub_category_id',$scat->id)->get();
                                                        ?>
                                                            @foreach($last_cat as $lstcat)
                                                        <li><a href="{{route('category.product',['cat_sug'=>$lstcat->cat_slug,'cat_id'=>$lstcat->id,'cat_type'=>3])}}">{{$lstcat->category_name}} </a></li>
                                                            @endforeach
                                                    </ul>
                                                </li>
                                                    @endforeach
                                            </div>

                                        </ul>
                                    </li>
                                    @endforeach
                                </div>








                            </ul>
                        </nav>

                        <!-- /.megamenu-horizontal -->
                    </div>
                    <!-- /.side-menu -->
                    <!-- ================================== TOP NAVIGATION : END ================================== -->

                </div>

                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 hero-banner">
                    <div id="hero">
                        <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                           @foreach($sliders as $slider)
                            <div class="item" style="background-image: url({{asset($slider->image)}});">
                                <div class="container-fluid">
                                    <div class="caption bg-color vertical-center text-left">
                                        <div class="big-text fadeInDown-1"> {{$slider->title}} </div>
                                        <div class="excerpt fadeInDown-2 hidden-xs"> <span>{!! $slider->sub_title !!}</span> </div>
                                        <div class="button-holder fadeInDown-3"> <a href="{{route('all.product')}}"
                                                                                    class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                                    </div>
                                    <!-- /.caption -->
                                </div>
                                <!-- /.container-fluid -->
                            </div>
                        @endforeach
                            <!-- /.item -->

                            <!-- /.item -->

                        </div>
                        <!-- /.owl-carousel -->
                    </div>
                    <div class="info-boxes wow fadeInUp">
                        <div class="info-boxes-inner">
                            <div class="row">
                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">money back</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">30 Days Money Back Guarantee</h6>
                                    </div>
                                </div>
                                <!-- .col -->

                                <div class="hidden-md col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">free shipping</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Shipping on orders over $99</h6>
                                    </div>
                                </div>
                                <!-- .col -->

                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">Special Sale</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Extra $5 off on all items </h6>
                                    </div>
                                </div>
                                <!-- .col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.info-boxes-inner -->

                    </div>
                </div>

            </div>


            <div class="row">

                <!-- ============================================== SCROLL TABS ============================================== -->
                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title pull-left">Latest Products</h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                            <li class=""><a data-transition-type="backSlide" href="#all" data-toggle="tab">View All Product</a></li>
                        </ul>
                        <!-- /.nav-tabs -->
                    </div>
                    <?php
                    $latest_product = \App\Models\product::orderBy('id','desc')
                        ->inRandomOrder()
                        ->limit(10)
                        ->get();
                    ?>
                    <div class="tab-content outer-top-xs">
                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                    @if(count($latest_product) > 0)
                                    @foreach($latest_product as $lproduct)
                                        <div class="item item-carousel">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="{{route('product.details',['slug'=>$lproduct->product_slug,'p_id'=>$lproduct->id])}}">
                                                                <img src="{{asset($lproduct->product_main_image)}}" alt="" style="height: 205px;width: 100%">
                                                            </a> </div>
                                                        <!-- /.image -->
                                                            <div class="tag new">
                                                                <span>new</span>
                                                            </div>
                                                    </div>
                                                    <!-- /.product-image -->

                                                    <div class="product-info text-left">
                                                        <h3 class="name"><a href="{{route('product.details',['slug'=>$lproduct->product_slug,'p_id'=>$lproduct->id])}}">{{$lproduct->product_name}}</a></h3>
                                                        <?php

                                                        $rating = \App\Models\product_review::where('product_id',$lproduct->id)->sum('star');
                                                        $rating_count = \App\Models\product_review::where('product_id',$lproduct->id)->count();
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
                                                            <span class="price"> ${{$lproduct->product_sell_price}} </span>
                                                            @if(!empty($lproduct->product_old_price))
                                                                <span class="price-before-discount">${{$lproduct->product_old_price}}</span>
                                                            @endif
                                                        </div>

                                                        <div class="button-holder fadeInDown-3">
                                                            <a href="{{route('product.details',['slug'=>$lproduct->product_slug,'p_id'=>$lproduct->id])}}" class="btn-lg btn btn-uppercase btn-primary shop-now-button btn-block">View Details</a>
                                                        </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                    <!-- /.product-info -->
                                                    <!-- /.cart -->
                                                </div>
                                                <!-- /.product -->

                                            </div>
                                            <!-- /.products -->
                                        </div>
                                @endforeach
                                @else
                                        <p>Sorry! No product available .</p>
                                @endif
                                <!-- /.item -->

                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->


                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.scroll-tabs -->
                <!-- ============================================== SCROLL TABS : END ============================================== -->

                <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                @foreach($categories as $category)
                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                        <div class="more-info-tab clearfix ">
                            <h3 class="new-product-title pull-left">{{$category->category_name}}</h3>
                            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                                <li class=""><a data-transition-type="backSlide" href="#all" data-toggle="tab">View All</a></li>
                            </ul>
                            <!-- /.nav-tabs -->
                        </div>
                        <div class="tab-content outer-top-xs">
                            <div class="tab-pane in active" id="all">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                        <?php

                                        $category_products = \App\Models\product::where('product_category_id',$category->id)
                                            ->inRandomOrder()
                                            ->limit(10)
                                            ->get();
                                        ?>
                                        @foreach($category_products as $catproduct)
                                            <div class="item item-carousel">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="{{route('product.details',['slug'=>$catproduct->product_slug,'p_id'=>$catproduct->id])}}">
                                                                    <img src="{{asset($catproduct->product_main_image)}}" alt="" style="height: 205px;width: 100%">
                                                                </a> </div>
                                                            <!-- /.image -->
                                                            @if($catproduct->is_new == 1)
                                                            <div class="tag new">
                                                                <span>new</span>
                                                            </div>
                                                            @elseif($catproduct->is_featured == 1)
                                                                <div class="tag new">
                                                                <span>Featured</span>
                                                                </div>
                                                            @else
                                                            @endif
                                                        </div>
                                                        <!-- /.product-image -->
                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a href="{{route('product.details',['slug'=>$catproduct->product_slug,'p_id'=>$catproduct->id])}}">{{$catproduct->product_name}}</a></h3>
                                                            <?php

                                                            $rating = \App\Models\product_review::where('product_id',$catproduct->id)->sum('star');
                                                            $rating_count = \App\Models\product_review::where('product_id',$catproduct->id)->count();
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
                                                                <span class="price"> ${{$catproduct->product_sell_price}} </span>
                                                                @if(!empty($catproduct->product_old_price))
                                                                    <span class="price-before-discount">${{$catproduct->product_old_price}}</span>
                                                                @endif
                                                            </div>

                                                            <div class="button-holder fadeInDown-3">
                                                                <a href="{{route('product.details',['slug'=>$catproduct->product_slug,'p_id'=>$catproduct->id])}}" class="btn-lg btn btn-uppercase btn-primary shop-now-button btn-block">View Details</a>
                                                            </div>
                                                            <!-- /.product-price -->
                                                        </div>
                                                        <!-- /.product-info -->
                                                        <!-- /.cart -->
                                                    </div>
                                                    <!-- /.product -->
                                                </div>
                                                <!-- /.products -->
                                            </div>
                                    @endforeach
                                    <!-- /.item -->
                                    </div>
                                    <!-- /.home-owl-carousel -->
                                </div>
                                <!-- /.product-slider -->
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
            @endforeach
            <!-- /.section -->
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

                <!-- ============================================== BLOG SLIDER ============================================== -->
                <section class="section latest-blog outer-bottom-vs wow fadeInUp">
                    <h3 class="section-title">latest form blog</h3>
                    <div class="blog-slider-container outer-top-xs">
                        <div class="owl-carousel blog-slider custom-carousel">
                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"> <a href="blog.html"><img src="{{asset('assets/frontend/')}}/images/blog-post/post1.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <!-- /.blog-post-image -->

                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="#">Voluptatem accusantium doloremque laudantium</a></h3>
                                        <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                                        <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam
                                            aliquam
                                            quaerat voluptatem.</p>
                                        <a href="#" class="lnk btn btn-primary">Read more</a>
                                    </div>
                                    <!-- /.blog-post-info -->

                                </div>
                                <!-- /.blog-post -->
                            </div>
                            <!-- /.item -->

                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"> <a href="blog.html"><img src="{{asset('assets/frontend/')}}/images/blog-post/post2.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <!-- /.blog-post-image -->

                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                                        <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                        <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam
                                            aliquam
                                            quaerat voluptatem.</p>
                                        <a href="#" class="lnk btn btn-primary">Read more</a>
                                    </div>
                                    <!-- /.blog-post-info -->

                                </div>
                                <!-- /.blog-post -->
                            </div>
                            <!-- /.item -->

                            <!-- /.item -->

                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"> <a href="blog.html"><img src="{{asset('assets/frontend/')}}/images/blog-post/post1.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <!-- /.blog-post-image -->

                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                                        <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                        <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                                        <a href="#" class="lnk btn btn-primary">Read more</a>
                                    </div>
                                    <!-- /.blog-post-info -->

                                </div>
                                <!-- /.blog-post -->
                            </div>
                            <!-- /.item -->

                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"> <a href="blog.html"><img src="{{asset('assets/frontend/')}}/images/blog-post/post2.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <!-- /.blog-post-image -->

                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                                        <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                        <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                                        <a href="#" class="lnk btn btn-primary">Read more</a>
                                    </div>
                                    <!-- /.blog-post-info -->

                                </div>
                                <!-- /.blog-post -->
                            </div>
                            <!-- /.item -->

                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image"> <a href="blog.html"><img src="{{asset('assets/frontend/')}}/images/blog-post/post1.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <!-- /.blog-post-image -->

                                    <div class="blog-post-info text-left">
                                        <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                                        <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                        <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                                        <a href="#" class="lnk btn btn-primary">Read more</a>
                                    </div>
                                    <!-- /.blog-post-info -->

                                </div>
                                <!-- /.blog-post -->
                            </div>
                            <!-- /.item -->

                        </div>
                        <!-- /.owl-carousel -->
                    </div>
                    <!-- /.blog-slider-container -->
                </section>
                <!-- /.section -->
                <!-- ============================================== BLOG SLIDER : END ============================================== -->

                <!-- ============================================== BRANDS CAROUSEL ============================================== -->
                <div id="brands-carousel" class="logo-slider wow fadeInUp">
                    <div class="row">
                        <div class="logo-slider-inner">
                            <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                                <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brand-logo/1.jpg"
                                                                                          src="{{asset('assets/frontend/')}}/images/brand-logo/1.jpg" alt="">
                                    </a>
                                </div>
                                <!--/.item-->
                                <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brand-logo/2.jpg"
                                                                                          src="{{asset('assets/frontend/')}}/images/brand-logo/2.jpg" alt="">
                                    </a>
                                </div>
                                <!--/.item-->
                                <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brand-logo/3.jpg"
                                                                                          src="{{asset('assets/frontend/')}}/images/brand-logo/3.jpg" alt="">
                                    </a>
                                </div>
                                <!--/.item-->
                                <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brand-logo/4.jpg"
                                                                                          src="{{asset('assets/frontend/')}}/images/brand-logo/4.jpg" alt="">
                                    </a>
                                </div>
                                <!--/.item-->
                                <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brand-logo/5.jpg"
                                                                                          src="{{asset('assets/frontend/')}}/images/brand-logo/5.jpg" alt="">
                                    </a>
                                </div>
                                <!--/.item-->
                                <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brand-logo/2.jpg"
                                                                                          src="{{asset('assets/frontend/')}}/images/brand-logo/2.jpg" alt="">
                                    </a>
                                </div>
                                <!--/.item-->
                                <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brand-logo/1.jpg"
                                                                                          src="{{asset('assets/frontend/')}}/images/brand-logo/1.jpg" alt="">
                                    </a>
                                </div>
                                <!--/.item-->
                                <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brand-logo/3.jpg"
                                                                                          src="{{asset('assets/frontend/')}}/images/brand-logo/3.jpg" alt=""></a>
                                </div>
                                <!--/.item-->
                            </div>
                            <!-- /.owl-carousel #logo-slider -->
                        </div>
                    </div>
                    <!-- /.logo-slider-inner -->
                </div>
                <!-- /.logo-slider -->
                <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->


                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#top-banner-and-menu -->

@endsection
