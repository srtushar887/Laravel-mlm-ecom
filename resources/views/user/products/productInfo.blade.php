@extends('layouts.user')
@section('user')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                   <form action="{{route('user.cart.single.save')}}" method="post">
                       @csrf
                    <div class="row">
                        <div class="col-xl-5">
                            <div class="product-detail">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active" id="product-1-tab" data-toggle="pill" href="#product-1" role="tab">
                                                <img src="{{asset($product->product_main_image)}}" alt="" class="img-fluid mx-auto d-block tab-img rounded" style="height: 70px;">
                                            </a>
                                            <a class="nav-link" id="product-2-tab" data-toggle="pill" href="#product-2" role="tab">
                                                <img src="{{asset($product->product_image_one)}}" alt="" class="img-fluid mx-auto d-block tab-img rounded" style="height: 70px;">
                                            </a>
                                            <a class="nav-link" id="product-3-tab" data-toggle="pill" href="#product-3" role="tab">
                                                <img src="{{asset($product->product_image_two)}}" alt="" class="img-fluid mx-auto d-block tab-img rounded" style="height: 70px;">
                                            </a>
                                            <a class="nav-link" id="product-4-tab" data-toggle="pill" href="#product-4" role="tab">
                                                <img src="{{asset($product->product_image_three)}}" alt="" class="img-fluid mx-auto d-block tab-img rounded" style="height: 70px;">
                                            </a>
                                            <a class="nav-link" id="product-4-tab" data-toggle="pill" href="#product-5" role="tab">
                                                <img src="{{asset($product->product_image_four)}}" alt="" class="img-fluid mx-auto d-block tab-img rounded" style="height: 70px;">
                                            </a>
                                            <a class="nav-link" id="product-4-tab" data-toggle="pill" href="#product-6" role="tab">
                                                <img src="{{asset($product->product_image_five)}}" alt="" class="img-fluid mx-auto d-block tab-img rounded" style="height: 70px;">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-9">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="product-1" role="tabpanel">
                                                <div class="product-img">
                                                    <img src="{{asset($product->product_main_image)}}" alt="" class="img-fluid mx-auto d-block" data-zoom="assets/images/product/img-1.png" style="height: 400px;width: 100%">
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="product-2" role="tabpanel">
                                                <div class="product-img">
                                                    <img src="{{asset($product->product_image_one)}}" alt="" class="img-fluid mx-auto d-block" style="height: 400px;width: 100%">
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="product-3" role="tabpanel">
                                                <div class="product-img">
                                                    <img src="{{asset($product->product_image_two)}}" alt="" class="img-fluid mx-auto d-block" style="height: 400px;width: 100%">
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="product-4" role="tabpanel">
                                                <div class="product-img">
                                                    <img src="{{asset($product->product_image_three)}}" alt="" class="img-fluid mx-auto d-block" style="height: 400px;width: 100%">
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="product-5" role="tabpanel">
                                                <div class="product-img">
                                                    <img src="{{asset($product->product_image_four)}}" alt="" class="img-fluid mx-auto d-block" style="height: 400px;width: 100%">
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="product-6" role="tabpanel">
                                                <div class="product-img">
                                                    <img src="{{asset($product->product_image_five)}}" alt="" class="img-fluid mx-auto d-block" style="height: 400px;width: 100%">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row text-center mt-2">
                                            <div class="col-sm-6">
                                                <input type="hidden" name="product_card_id" value="{{$product->id}}">
                                                <button type="submit" class="btn btn-primary btn-block waves-effect waves-light mt-2 mr-1">
                                                    <i class="mdi mdi-cart mr-2"></i> Add to cart
                                                </button>
                                            </div>
                                            <div class="col-sm-6">

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- end product img -->
                        </div>
                        <div class="col-xl-7">
                            <div class="mt-4 mt-xl-3">
                                <a href="#" class="text-primary">T-shirt</a>
                                <h5 class="mt-1 mb-3">{{$product->product_name}}</h5>

                                <div class="d-inline-flex">

                                    <?php

                                    $rating = \App\Models\product_review::where('product_id',$product->id)->sum('star');
                                    $rating_count = \App\Models\product_review::where('product_id',$product->id)->count();
                                    $rat = ($rating * 5  ) /100;
                                    ?>

                                    <div class="text-muted mr-3">
                                        @if ($rating_count > 0)
                                            @for ($i = 0; $i < $rat; $i++)
                                                <span class="fa fa-star checked" style="color: orange"></span>
                                            @endfor
                                        @else
                                            No Review
                                        @endif
                                    </div>
                                    <div class="text-muted">( {{$rating_count}} )</div>
                                </div>

                                <h5 class="mt-2">
                                    @if(!empty($product->product_old_price))
                                    <del class="text-muted mr-2">{{$product->product_old_price}}</del>
                                    @endif
                                    ${{$product->product_sell_price}} </h5>
                                <p class="mt-3">{!! $product->product_sort_description !!}</p>
                                <hr class="my-4">

                                <div class="row">
                                    <?php
                                    $color_count = \App\Models\product_color::where('product_id',$product->id)->get();
                                    $size_count = \App\Models\product_size::where('product_id',$product->id)->get();
                                    ?>
                                    @if(count($color_count) > 0)
                                    <div class="col-md-6">

                                        <div>
                                            <h5 class="font-size-14"><i class="mdi mdi-location"></i> Product Color</h5>
                                            <div class="form-inline">

                                                <div class="input-group mb-6">
                                                    <select class="form-control" name="product_color">
                                                        <option>--- select any color ----</option>
                                                        @foreach($color_count as $color)
                                                            <?php
                                                            $color = \App\Models\color::where('id',$color->color_id)->first();
                                                            ?>
                                                        <option value="{{$color->id}}">{{$color->color_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                        @endif



                                        @if(count($size_count) > 0)
                                    <div class="col-md-6">
                                        <div>
                                            <h5 class="font-size-14"><i class="mdi mdi-location"></i> Product Size</h5>
                                            <div class="form-inline">

                                                <div class="input-group mb-3">
                                                    <select class="form-control" name="product_size">
                                                        <option>--- select any size ----</option>
                                                        @foreach($size_count as $sizecount)
                                                            <?php
                                                            $size = \App\Models\size::where('id',$sizecount->size_id)->first();
                                                            ?>
                                                        <option value="{{$size->id}}">{{$size->size_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                        @endif

                                </div>


                            </div>
                        </div>
                    </div>
                   </form>
                    <!-- end row -->

                    <div class="mt-4">
                        <h5 class="font-size-14 mb-3">Product description: </h5>
                        <div class="product-desc">
                            <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="desc-tab" data-toggle="tab" href="#desc" role="tab">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="specifi-tab" data-toggle="tab" href="#specifi" role="tab">Review</a>
                                </li>
                            </ul>
                            <div class="tab-content border border-top-0 p-4">
                                <div class="tab-pane fade show active" id="desc" role="tabpanel">
                                    <div>
                                        <p>{!! $product->product_long_description !!}</p>


                                    </div>
                                </div>
                                <div class="tab-pane fade  " id="specifi" role="tabpanel">
                                  <form action="{{route('user.product.info.review.save')}}" method="post">
                                      @csrf
                                   <div class="row">
                                       <div class="form-group col-md-12">
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
                                                   <td><input type="radio" name="star" class="radio startradio" value="1"></td>
                                                   <td><input type="radio" name="star" class="radio startradio" value="2"></td>
                                                   <td><input type="radio" name="star" class="radio startradio" value="3"></td>
                                                   <td><input type="radio" name="star" class="radio startradio" value="4"></td>
                                                   <td><input type="radio" name="star" class="radio startradio" value="5"></td>
                                               </tr>
                                               </tbody>
                                           </table>
                                       </div>
                                       <div class="form-group col-md-12">
                                            <textarea class="form-control reviewtext" name="desc" cols="5" rows="5"></textarea>
                                           <input type="hidden" name="product_review_id" value="{{$product->id}}">
                                       </div>
                                   </div>
                                    <button class="btn btn-success" id="submitreviuew" type="submit">Submit</button>
                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h5 class="font-size-14">Product Reviews : </h5>
                        <div class="d-inline-flex mb-3">
                            <div class="text-muted mr-3">

                                @if ($rating_count > 0)
                                    @for ($i = 0; $i < $rat; $i++)
                                        <span class="fa fa-star checked" style="color: orange"></span>
                                    @endfor
                                @else
                                    No Review
                                @endif
                            </div>
                            <div class="text-muted">( {{$rating_count}}  customer Review)</div>
                        </div>
                        <div class="border p-4 rounded">
                            @foreach($product_reviews as $review)
                            <div class="media border-bottom pb-3">
                                <div class="media-body">
                                    <p class="text-muted mb-2">{!! $review->desc !!}</p>
                                    <h5 class="font-size-15 mb-3">{{$review->reviewr_name}}</h5>

                                    <ul class="list-inline product-review-link mb-0">

                                    </ul>
                                </div>
                                <p class="float-sm-right font-size-12">{{$review->created_at->diffForHumans()}}</p>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
@endsection
