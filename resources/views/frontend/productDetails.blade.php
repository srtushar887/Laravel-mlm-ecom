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
                    <li class='active'>Products</li>
                    <li><a href="#">{{$product->product_name}}</a></li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>

    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product'>
                <div class='col-md-12'>
                    <div class="detail-block">
                        <div class="row  wow fadeInUp">
                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">

                                    <div id="owl-single-product">
                                        <div class="single-product-gallery-item" id="slide1">
                                            @if(!empty($product->product_main_image) && file_exists($product->product_main_image))
                                            <a data-lightbox="image-1" data-title="Gallery" href="{{asset($product->product_main_image)}}">
                                                <img class="img-responsive" alt="" src="{{asset('assets/frontend/')}}/images/blank.gif"
                                                     data-echo="{{asset($product->product_main_image)}}" style="height: 400px;width: 100%"/>
                                            </a>
                                            @endif
                                        </div><!-- /.single-product-gallery-item -->
                                        @if(!empty($product->product_image_one) && file_exists($product->product_image_one))
                                        <div class="single-product-gallery-item" id="slide2">
                                            <a data-lightbox="image-1" data-title="Gallery" href="{{asset($product->product_main_image)}}">
                                                <img class="img-responsive" alt="" src="{{asset('assets/frontend/')}}/images/blank.gif"
                                                     data-echo="{{asset($product->product_image_one)}}" style="height: 400px;width: 100%"/>
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->
                                        @endif
                                        @if(!empty($product->product_image_two) && file_exists($product->product_image_two))
                                        <div class="single-product-gallery-item" id="slide3">
                                            <a data-lightbox="image-1" data-title="Gallery" href="{{asset($product->product_image_two)}}">
                                                <img class="img-responsive" alt="" src="{{asset('assets/frontend/')}}/images/blank.gif"
                                                     data-echo="{{asset($product->product_image_two)}}" style="height: 400px;width: 100%"/>
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->
                                        @endif
                                        @if(!empty($product->product_image_three) && file_exists($product->product_image_three))
                                        <div class="single-product-gallery-item" id="slide4">
                                            <a data-lightbox="image-1" data-title="Gallery" href="{{asset($product->product_image_three)}}">
                                                <img class="img-responsive" alt="" src="{{asset('assets/frontend/')}}/images/blank.gif"
                                                     data-echo="{{asset($product->product_image_three)}}" style="height: 400px;width: 100%"/>
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->
                                        @endif
                                        @if(!empty($product->product_image_four) && file_exists($product->product_image_four))
                                        <div class="single-product-gallery-item" id="slide5">
                                            <a data-lightbox="image-1" data-title="Gallery" href="{{asset($product->product_image_four)}}">
                                                <img class="img-responsive" alt="" src="{{asset('assets/frontend/')}}/images/blank.gif"
                                                     data-echo="{{asset($product->product_image_four)}}" style="height: 400px;width: 100%" />
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->
                                        @endif
                                        @if(!empty($product->product_image_five) && file_exists($product->product_image_five))
                                        <div class="single-product-gallery-item" id="slide6">
                                            <a data-lightbox="image-1" data-title="Gallery" href="{{asset($product->product_image_five)}}">
                                                <img class="img-responsive" alt="" src="{{asset('assets/frontend/')}}/images/blank.gif"
                                                     data-echo="{{asset($product->product_image_five)}}" style="height: 400px;width: 100%"/>
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->
                                        @endif
                                    </div><!-- /.single-product-slider -->


                                    <div class="single-product-gallery-thumbs gallery-thumbs">

                                        <div id="owl-single-product-thumbnails">
                                            @if(!empty($product->product_main_image) && file_exists($product->product_main_image))
                                            <div class="item">
                                                <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1"
                                                   href="#slide1">
                                                    <img class="img-responsive" width="85" alt="" src="{{asset('assets/frontend/')}}/images/blank.gif"
                                                         data-echo="{{asset($product->product_main_image)}}" style="height: 100px;width: 100px;"/>
                                                </a>
                                            </div>
                                            @endif

                                                @if(!empty($product->product_image_one) && file_exists($product->product_image_one))
                                            <div class="item">
                                                <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide2">
                                                    <img class="img-responsive" width="85" alt="" src="{{asset('assets/frontend/')}}/images/blank.gif"
                                                         data-echo="{{asset($product->product_image_one)}}" style="height: 100px;width: 100px;"/>
                                                </a>
                                            </div>
                                                @endif

                                                @if(!empty($product->product_image_two) && file_exists($product->product_image_two))
                                            <div class="item">

                                                <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="3" href="#slide3">
                                                    <img class="img-responsive" width="85" alt="" src="{{asset('assets/frontend/')}}/images/blank.gif"
                                                         data-echo="{{asset($product->product_image_two)}}" style="height: 100px;width: 100px;"/>
                                                </a>
                                            </div>
                                                @endif

                                                @if(!empty($product->product_image_three) && file_exists($product->product_image_three))
                                            <div class="item">

                                                <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="4" href="#slide4">
                                                    <img class="img-responsive" width="85" alt="" src="{{asset('assets/frontend/')}}/images/blank.gif"
                                                         data-echo="{{asset($product->product_image_three)}}" style="height: 100px;width: 100px;"/>
                                                </a>
                                            </div>

                                                @endif

                                                @if(!empty($product->product_image_four) && file_exists($product->product_image_four))
                                            <div class="item">

                                                <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="5" href="#slide5">
                                                    <img class="img-responsive" width="85" alt="" src="{{asset('assets/frontend/')}}/images/blank.gif"
                                                         data-echo="{{asset($product->product_image_four)}}" style="height: 100px;width: 100px;" />
                                                </a>
                                            </div>

                                                @endif

                                                @if(!empty($product->product_image_five) && file_exists($product->product_image_five))
                                            <div class="item">

                                                <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="6" href="#slide6">
                                                    <img class="img-responsive" width="85" alt="" src="{{asset('assets/frontend/')}}/images/blank.gif"
                                                         data-echo="{{asset($product->product_image_five)}}" style="height: 100px;width: 100px;"/>
                                                </a>
                                            </div>
                                                @endif

                                        </div><!-- /#owl-single-product-thumbnails -->



                                    </div><!-- /.gallery-thumbs -->

                                </div><!-- /.single-product-gallery -->
                            </div><!-- /.gallery-holder -->
                            <div class='col-sm-6 col-md-7 product-info-block'>
                                <div class="product-info">
                                    <h1 class="name">{{$product->product_name}}</h1>

                                    <div class="rating-reviews m-t-20">
                                        <div class="row">
                                            <div class="col-sm-3">
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
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    <a href="#" class="lnk">
                                                        @if($review_count <= 1)
                                                        ({{$review_count}} Review)
                                                        @else
                                                        ({{$review_count}} Reviews)
                                                        @endif
                                                    </a>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.rating-reviews -->

                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="stock-box">
                                                    <span class="label">Availability :</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="stock-box">
                                                    <span class="value">
                                                        @if($product->product_qty <= 0)
                                                        Out of Stock
                                                        @else
                                                        In Stock
                                                            @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.stock-container -->

                                    <div class="description-container m-t-20">
                                        {!! $product->product_sort_description !!}
                                    </div><!-- /.description-container -->

                                    <div class="price-container info-container m-t-20">
                                        <div class="row">


                                            <div class="col-sm-12">
                                                <div class="price-box">
                                                    <span class="price">${{$product->product_sell_price}}</span>
                                                    @if(!empty($product->product_old_price))
                                                        <span class="price-strike">${{$product->product_old_price}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <br>
                                            <br>

                                            <div class="col-sm-6">
                                                <select class="form-control colorid">
                                                    <option value="0">select color</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-6">
                                                <select class="form-control sizeid">
                                                    <option value="0">select size</option>
                                                </select>
                                            </div>



                                        </div><!-- /.row -->
                                    </div><!-- /.price-container -->

                                    <div class="quantity-container info-container">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <span class="label">Qty :</span>
                                            </div>
                                            <form >
                                                <div class="col-sm-2">
                                                    <div class="cart-quantity">
                                                        <div class="quant-input">
                                                            <div class="arrows">
                                                                <div class="arrow plus gradient"><span class="ir"><i
                                                                            class="icon fa fa-sort-asc"></i></span></div>
                                                                <div class="arrow minus gradient"><span class="ir"><i
                                                                            class="icon fa fa-sort-desc"></i></span></div>
                                                            </div>
                                                            <input type="text" value="1" class="qty">

                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" value="{{$product->id}}" class="productid" >
                                                <div class="col-sm-7">
                                                    <button class="btn btn-primary" id="addcard">ADD TO CART</button>
                                                </div>
                                            </form>


                                        </div><!-- /.row -->
                                    </div><!-- /.quantity-container -->






                                </div><!-- /.product-info -->
                            </div><!-- /.col-sm-7 -->
                        </div><!-- /.row -->
                    </div>

                    <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                        <div class="row">
                            <div class="col-sm-3">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                    <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                    <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                                </ul><!-- /.nav-tabs #product-tabs -->
                            </div>
                            <div class="col-sm-9">

                                <div class="tab-content">

                                    <div id="description" class="tab-pane in active">
                                        <div class="product-tab">
                                            <p class="text">{!! $product->product_long_description !!}</p>
                                        </div>
                                    </div><!-- /.tab-pane -->

                                    <div id="review" class="tab-pane">
                                        <div class="product-tab">

                                            <div class="product-reviews">
                                                <h4 class="title">Customer Reviews</h4>

                                                <div class="reviews">
                                                    <div class="review">
                                                        <div class="review-title"><span class="summary">We love this product</span><span
                                                                class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
                                                        <div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam
                                                            suscipit."</div>
                                                    </div>

                                                </div><!-- /.reviews -->
                                            </div><!-- /.product-reviews -->



                                            <div class="product-add-review">
                                                <h4 class="title">Write your own review</h4>
                                                <form role="form" class="cnt-form" action="{{route('product.review.save')}}" method="post">
                                                    @csrf
                                                    <div class="review-table">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <th class="cell-label">&nbsp;</th>
                                                                <th>1 star</th>
                                                                <th>2 stars</th>
                                                                <th>3 stars</th>
                                                                <th>4 stars</th>
                                                                <th>5 stars</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td class="cell-label">Review Star</td>
                                                                <td><input type="radio" name="star" class="radio" value="1"></td>
                                                                <td><input type="radio" name="star" class="radio" value="2"></td>
                                                                <td><input type="radio" name="star" class="radio" value="3"></td>
                                                                <td><input type="radio" name="star" class="radio" value="4"></td>
                                                                <td><input type="radio" name="star" class="radio" value="5"></td>
                                                            </tr>
                                                            </tbody>
                                                        </table><!-- /.table .table-bordered -->
                                                    </div><!-- /.table-responsive -->
                                                </div><!-- /.review-table -->

                                                <div class="review-form">
                                                    <div class="form-container">


                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputName">Your Name <span class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt" id="exampleInputName" placeholder="" name="reviewr_name">
                                                                        <input type="hidden" class="form-control txt" id="exampleInputName" placeholder="" name="product_review_id" value="{{$product->id}}">
                                                                    </div><!-- /.form-group --><!-- /.form-group -->
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                                                        <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4"
                                                                                  placeholder="" name="desc"></textarea>
                                                                    </div><!-- /.form-group -->
                                                                </div>
                                                            </div><!-- /.row -->

                                                            <div class="action text-right">
                                                                <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                                            </div><!-- /.action -->



                                                    </div><!-- /.form-container -->
                                                </div><!-- /.review-form -->
                                                </form><!-- /.cnt-form -->

                                            </div><!-- /.product-add-review -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->


                                </div><!-- /.tab-content -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.product-tabs -->

                    <!-- ============================================== SCROLL TABS ============================================== -->
                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                        <div class="more-info-tab clearfix ">
                            <h3 class="new-product-title pull-left">Related Products</h3>
                            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">

                            </ul>
                            <!-- /.nav-tabs -->
                        </div>
                        <div class="tab-content outer-top-xs">
                            <div class="tab-pane in active" id="all">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                        @foreach($latest_products as $lproduct)
                                            <div class="item item-carousel">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="#"><img src="{{asset($lproduct->product_main_image)}}" alt=""></a> </div>
                                                            <!-- /.image -->

                                                            <div class="tag new"><span>new</span></div>
                                                        </div>
                                                        <!-- /.product-image -->

                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a href="">{{$lproduct->product_name}}</a></h3>
                                                            <div class="rating rateit-small">

                                                            </div>
                                                            <div class="description"></div>
                                                            <div class="product-price"> <span class="price"> ${{$lproduct->product_sell_price}} </span>
                                                                @if(!empty($lproduct->product_old_price))
                                                                    <span class="price-before-discount">{{$lproduct->product_old_price}}</span>
                                                                @endif
                                                            </div>

                                                            <div class="button-holder fadeInDown-3"> <a href="#"
                                                                                                        class="btn-lg btn btn-uppercase btn-primary shop-now-button">add To Cart</a> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                        <!-- /.product-info -->
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        <button data-toggle="tooltip" class="btn btn-primary icon" type="button"
                                                                                title="Add Cart">
                                                                            <i class="fas fa-cart-plus"></i> </button>

                                                                    </li>
                                                                    <li class="view-more">
                                                                        <button data-toggle="tooltip" class="btn btn-primary icon" type="button"
                                                                                title="View Detail"> <i class="fas fa-eye"></i> </button>
                                                                    </li>
                                                                </ul>
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
                </div><!-- /.col -->
                <div class="clearfix"></div>
            </div><!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {

            $('#addcard').click(function (e) {
                e.preventDefault();
                var product = $('.productid').val();
                var color = $('.colorid').val();
                var size = $('.sizeid').val();
                var qty = $('.qty').val();

                $.ajax({
                    type : "POST",
                    url: "{{route('add.to.card')}}",
                    data : {
                        '_token' : "{{csrf_token()}}",
                        'product' : product,
                        'color' : color,
                        'size' : size,
                        'qty' : qty,
                    },
                    success:function(data){
                        console.log(data);
                        swal("Product added in cart", "", "success");
                        setTimeout(function () {
                            location.reload();
                        },2000)

                    }
                });
            })



        })
    </script>
@endsection
