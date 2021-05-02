@extends('layouts.user')
@section('user')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">order details</h4>

                <div class="page-title-right">
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="{{route('admin.order.update')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">Order Created Date</label>
                                    <input type="text" class="form-control"  name="site_name" value="{{\Carbon\Carbon::parse($order->created_at)->format('y-m-d')}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">Order ID</label>
                                    <input type="text" class="form-control"  name="site_name" value="{{$order->order_id}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">Total Amount</label>
                                    <input type="text" class="form-control"  name="site_name" value="${{$order->total_amount}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">Order Current Status</label>
                                    @if($order->status == 1)
                                        <input type="text" class="form-control"  name="site_name" value="Pending" readonly>
                                    @elseif($order->status == 2)
                                        <input type="text" class="form-control"  name="site_name" value="Approved" readonly>
                                    @elseif($order->status == 3)
                                        <input type="text" class="form-control"  name="site_name" value="Rejected" readonly>
                                    @elseif($order->status == 4)
                                        <input type="text" class="form-control"  name="site_name" value="Delivered" readonly>
                                    @elseif($order->status == 5)
                                        <input type="text" class="form-control"  name="site_name" value="Canceled" readonly>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

    </div>



    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order Details</h4>

                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                            <tr>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order_details as $orderdetails)
                                <?php
                                $products = \App\Models\product::where('id',$orderdetails->product_id)->first();
                                $total_am = ($products->product_sell_price * $orderdetails->qty)
                                ?>
                                <tr>
                                    <th scope="row">
                                        <img src="{{asset($products->product_main_image)}}" style="height: 50px;width: 50px;">
                                    </th>
                                    <td>
                                        {{$products->product_name}}<br>
                                        Size : 100 <br>
                                        Color : 100
                                    </td>
                                    <td>{{$products->product_sell_price}}</td>
                                    <td>{{$orderdetails->qty}}</td>
                                    <td>{{$total_am}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>


@endsection
