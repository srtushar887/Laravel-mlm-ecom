@foreach($products as $product)
    <div class="col-sm-6 col-md-4 wow fadeInUp">
        <div class="products">
            <div class="product">
                <div class="product-image">
                    <div class="image"> <a href="{{route('product.details',['slug'=>$product->product_slug,'p_id'=>$product->id])}}">
                            <img src="{{asset($product->product_main_image)}}" alt=""></a> </div>
                    <!-- /.image -->

                    @if($product->is_new == 1)
                        <div class="tag new">
                            <span>new</span>
                        </div>
                    @elseif($product->is_featured == 1)
                        <div class="tag new">
                            <span>Featured</span>
                        </div>
                    @else
                    @endif
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



<div class="col col-sm-12 col-md-12 text-center ">
    <div class="lbl-cnt">
        <div class="fld inline">
            {{$products->links()}}
        </div>
        <!-- /.fld -->
    </div>


</div>



