@extends('layouts.frontend')
@section('search')
    <div class="search-area">
        <form action="{{route('search.product')}}" method="get">
            @csrf
            <div class="control-group">
                <input class="search-field" name="search" placeholder="Search Product here..." />
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
                    <li class="active">All Products</li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>

    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row">
                <!-- /.sidebar -->
                <div class="col-md-12 m-t-10">
                    <!-- ========================================== SECTION – HERO ========================================= -->

                    <div class="clearfix filters-container">
                        <div class="row">
                            <div class="col col-sm-6 col-md-6">
                                <div class="filter-tabs">
                                    <p>
                                        <button type="button" class="btn btn-primary">{{$count_product}} Results</button>
                                    </p>
                                </div>
                                <!-- /.filter-tabs -->
                            </div>
                            <!-- /.col -->

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
                                            <div class="col-sm-6 col-md-4 wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="{{route('product.details',['slug'=>$product->product_slug,'p_id'=>$product->id])}}">
                                                                    <img src="{{asset($product->product_main_image)}}" alt=""></a> </div>
                                                            <!-- /.image -->

                                                            <div class="tag new"><span>new</span></div>
                                                        </div>
                                                        <!-- /.product-image -->

                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a href="{{route('product.details',['slug'=>$product->product_slug,'p_id'=>$product->id])}}">{{$product->product_name}}</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="description"></div>
                                                            <div class="product-price">
                                                                <span class="price"> ${{$product->product_sell_price}} </span>
                                                                @if(!empty($product->product_old_price))
                                                                    <span class="price-before-discount">${{$product->product_old_price}}</span>
                                                                @endif
                                                            </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                        <div class="button-holder fadeInDown-3">
                                                            <a href="{{route('product.details',['slug'=>$product->product_slug,'p_id'=>$product->id])}}" class="btn-lg btn btn-uppercase btn-primary shop-now-button btn-block">View Details</a>
                                                        </div>
                                                        <!-- /.product-info -->

                                                    </div>
                                                    <!-- /.product -->

                                                </div>
                                                <!-- /.products -->
                                            </div>
                                    @endforeach
                                    <!-- /.item -->

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
                            <div class="text-right">
                            {{$products->links()}}
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
