@extends('layouts.user')
@section('user')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Shopping Cart</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-centered mb-0 table-nowrap">
                            <thead class="bg-light">
                            <tr>
                                <th style="width: 120px">Product</th>
                                <th>Product Desc</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <form action="{{route('update.shopping.cart')}}" method="post">
                                @csrf
                            <tbody>
                            <?php
                            $carts = \Gloudemans\Shoppingcart\Facades\Cart::content();
                            $counts = \Gloudemans\Shoppingcart\Facades\Cart::content()->count();
                            $sub = \Gloudemans\Shoppingcart\Facades\Cart::content()->sum('price');
                            ?>
                            @if($counts > 0)
                                @foreach($carts as $crt)
                            <tr>
                                <td>
                                    <img src="{{asset($crt->options->image)}}" style="height: 70px;" alt="product-img" title="product-img" class="avatar-md">
                                    <input type="hidden" value="{{$crt->rowId}}" name="cart_id[]">
                                </td>
                                <td>
                                    <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">{{$crt->name}}</a></h5>
                                    <p class="mb-0">Color : <span class="font-weight-medium">Blue</span></p>
                                    <p class="mb-0">Size : <span class="font-weight-medium">Blue</span></p>
                                </td>
                                <td>
                                    $ {{$crt->price}}
                                </td>
                                <td>
                                    <div style="width: 120px;" class="product-cart-touchspin">
                                        <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                            <span class="input-group-btn input-group-prepend">
                                                <button class="btn btn-primary bootstrap-touchspin-down" type="button">-</button>
                                            </span>
                                            <input data-toggle="touchspin" type="text" value="{{$crt->qty}}" name="qty[]" class="form-control">
                                            <span class="input-group-btn input-group-append"><button class="btn btn-primary bootstrap-touchspin-up" type="button">+</button>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    $ {{$crt->subTotal()}}
                                </td>
                                <td style="width: 90px;" class="text-center">
                                    <a href="{{route('cart.item.remove',$crt->rowId)}}" class="action-icon text-danger"> <i class="mdi mdi-trash-can font-size-18"></i></a>
                                </td>
                            </tr>
                                @endforeach
                            @endif
                            <tr class="bg-light text-right">

                                <th scope="row" colspan="5">
                                    <button class="btn btn-success btn-sm">Proceed Checkout</button>
                                </th>

                                <td>
                                    <button type="submit" class="btn btn-success btn-sm">Updated Cart</button>
                                </td>
                            </tr>
                            <tr class="bg-light text-right">

                                <th scope="row" colspan="5">
                                    Sub Total :
                                </th>

                                <td>
                                    $ {{\Gloudemans\Shoppingcart\Facades\Cart::subTotal()}}
                                </td>
                            </tr>
                            <tr class="bg-light text-right">

                                <th scope="row" colspan="5">
                                    Total :
                                </th>

                                <td>
                                    $ {{\Gloudemans\Shoppingcart\Facades\Cart::subTotal()}}
                                </td>
                            </tr>
                            </tbody>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
