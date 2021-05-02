<div>
    <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <div class="row">
                        <div class="col-md-6">
                            <div>

                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-inline float-md-right">
                                <div class="search-box ml-2">
                                    <div class="position-relative">
                                        <input type="text" class="form-control rounded" placeholder="Search..." wire:model="searchproduct">
                                        <i class="mdi mdi-magnify search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <br>


                    <div class="row no-gutters">
                        @foreach($products as $product)
                        <div class="col-xl-4 col-sm-6">
                            <div class="product-box">
                                <div class="product-img">
                                    @if($product->is_new == 1)
                                    <div class="product-ribbon badge badge-warning">
                                        New
                                    </div>
                                    @elseif($product->is_featured == 1)
                                        <div class="product-ribbon badge badge-warning">
                                            Featured
                                        </div>
                                    @else
                                    @endif
                                    <img src="{{asset($product->product_main_image)}}" style="height: 300px;" alt="" class="img-fluid mx-auto d-block">
                                </div>

                                <div class="text-center">
                                    <h5 class="font-size-15"><a href="{{route('user.product.info',$product->id)}}" class="text-dark">{{$product->product_name}}</a></h5>

                                    <h5 class="mt-3 mb-0">${{$product->product_sell_price}}
                                        @if(!empty($product->product_old_price))
                                        <del>${{$product->product_old_price}}</del>
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <div class="row mt-4">

                        <div class="col-sm-12 text-center">
                            {{$products->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
