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
                    <li class='active'>Shopping Cart</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>


    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="">
                <div class="shopping-cart">
                    <div class="shopping-cart-table ">
                        <div class="table-responsive">
                            <form action="{{route('update.shopping.cart')}}" method="post">
                                @csrf
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="cart-romove item">Remove</th>
                                        <th class="cart-description item">Image</th>
                                        <th class="cart-product-name item">Product Name</th>
                                        <th class="cart-qty item">Quantity</th>
                                        <th class="cart-sub-total item">Subtotal</th>
                                        <th class="cart-total last-item">Grandtotal</th>
                                    </tr>
                                    </thead><!-- /thead -->
                                    <tfoot>
                                    <tr>
                                        <td colspan="7">
                                            <div class="shopping-cart-btn">
                                            <span class="">
                                                <a href="{{route('all.product')}}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
                                                <button type="submit" class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping cart</button>
                                            </span>
                                            </div>
                                            <!-- /.shopping-cart-btn -->
                                        </td>


                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $carts = \Gloudemans\Shoppingcart\Facades\Cart::content();
                                    $counts = \Gloudemans\Shoppingcart\Facades\Cart::content()->count();
                                    $sub = \Gloudemans\Shoppingcart\Facades\Cart::content()->sum('price');
                                    ?>
                                    @if($counts > 0)
                                        @foreach($carts as $crt)
                                            <tr>
                                                <td class="romove-item"><a href="{{route('cart.item.remove',$crt->rowId)}}" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                                <td class="cart-image">
                                                    <a class="entry-thumbnail" href="detail.html">
                                                        <img src="{{asset($crt->options->image)}}" style="height: 100px;width: 100px;" alt="">
                                                    </a>
                                                    <input type="hidden" value="{{$crt->rowId}}" name="cart_id[]">
                                                </td>
                                                <td class="cart-product-name-info">
                                                    <h4 class='cart-product-description'><a href="detail.html">{{$crt->name}}</a></h4>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="rating rateit-small"></div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="reviews">
                                                                (06 Reviews)
                                                            </div>
                                                        </div>
                                                    </div><!-- /.row -->
                                                    <div class="cart-product-info">
                                                        <span class="product-color">COLOR:<span>Blue</span></span> |
                                                        <span class="product-color">COLOR:<span>Blue</span></span>
                                                    </div>
                                                </td>
                                                <td class="cart-product-quantity">
                                                    <div class="quant-input">
                                                        <div class="arrows">
                                                            <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span>
                                                            </div>
                                                            <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span>
                                                            </div>
                                                        </div>
                                                        <input type="text" value="{{$crt->qty}}" name="qty[]">
                                                    </div>
                                                </td>
                                                <td class="cart-product-sub-total"><span class="cart-sub-total-price">${{$crt->subTotal()}}</span></td>
                                                <td class="cart-product-grand-total"><span class="cart-grand-total-price">${{$crt->subTotal()}}</span></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody><!-- /tbody -->
                                </table><!-- /table -->
                            </form>
                        </div>
                    </div><!-- /.shopping-cart-table -->



                    <div class="col-md-12 col-sm-12 cart-shopping-total">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>
                                    <div class="cart-sub-total">
                                        Subtotal<span class="inner-left-md">${{\Gloudemans\Shoppingcart\Facades\Cart::subTotal()}}</span>
                                    </div>
                                    <div class="cart-grand-total">
                                        Grand Total<span class="inner-left-md">${{\Gloudemans\Shoppingcart\Facades\Cart::subTotal()}}</span>
                                    </div>
                                </th>
                            </tr>
                            </thead><!-- /thead -->
                            <tbody>
                            <tr>
                                <td>
                                    <div class="cart-checkout-btn pull-right">
                                        <a href="{{route('checkout')}}">

                                            <button type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.cart-shopping-total -->
                </div><!-- /.shopping-cart -->
            </div> <!-- /.row -->

        </div><!-- /.container -->
    </div>


@endsection
