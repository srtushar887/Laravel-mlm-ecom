@extends('layouts.user')
@section('user')



    <div class="container-fluid mt-2 mb-5">
        <div class="products">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="d-flex justify-content-between p-3 bg-white mb-3 align-items-center"> <span class="font-weight-bold text-uppercase"></span>
                        <div>
                            <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Product">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="row g-3">
                        @foreach($products as $pro)
                        <div class="col-md-4">
                            <div class="card">
                                <a href="{{route('user.product.info',$pro->id)}}">
                                @if(!empty($pro->product_main_image) && file_exists($pro->product_main_image))
                                <img src="{{asset($pro->product_main_image)}}" class="card-img-top" style="height: 300px;">
                                @else
                                <img src="https://www.chanchao.com.tw/images/default.jpg" class="card-img-top" style="height: 300px;">
                                @endif
                                </a>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <a href="{{route('user.product.info',$pro->id)}}">
                                            <span class="font-weight-bold">{{$pro->product_name}}</span>
                                        </a>

                                        <span class="font-weight-bold">
                                            ${{$pro->product_sell_price}}
                                            @if(!empty($pro->product_old_price))
                                            <del>{{$pro->product_old_price}}</del>
                                            @endif
                                        </span> </div>
                                    <p class="card-text mb-1 mt-1">{!! substr($pro->product_sort_description,0,100) !!}.......</p>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <div class="text-right buttons">

                                        <button class="btn btn-dark">Add to cart</button> </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    {{$products->links()}}
                </div>

            </div>
        </div>
    </div>


{{--    @livewire('user.show-product')--}}
@endsection
