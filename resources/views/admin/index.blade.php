@extends('layouts.admin')
@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Dashboard</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body overflow-hidden">
                                    <p class="text-truncate font-size-14 mb-2">Total Users</p>
                                    <h4 class="mb-0">{{$total_users}}</h4>
                                </div>
                                <div class="text-primary">
                                    <i class="ri-stack-line font-size-24"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body overflow-hidden">
                                    <p class="text-truncate font-size-14 mb-2">Total Product</p>
                                    <h4 class="mb-0">{{$total_product}}</h4>
                                </div>
                                <div class="text-primary">
                                    <i class="ri-store-2-line font-size-24"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body overflow-hidden">
                                    <p class="text-truncate font-size-14 mb-2">Total Order</p>
                                    <h4 class="mb-0">{{$total_orders}}</h4>
                                </div>
                                <div class="text-primary">
                                    <i class="ri-briefcase-4-line font-size-24"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body overflow-hidden">
                                    <p class="text-truncate font-size-14 mb-2">Delivered Order</p>
                                    <h4 class="mb-0">{{$total_orders_delivered}}</h4>
                                </div>
                                <div class="text-primary">
                                    <i class="ri-briefcase-4-line font-size-24"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- end row -->

        </div>

    </div>
    <!-- end row -->


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Latest Order</h4>

                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>User Name</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($laste_orders) > 0)
                            @foreach($laste_orders as $lasrorder)
                            <tr>
                                <td>{{$lasrorder->order_id}}</td>
                                <td>{{$lasrorder->user->name}}</td>
                                <td>{{$lasrorder->total_amount}}</td>
                                <td>
                                    <a href="{{route('admin.order.details',$lasrorder->id)}}">
                                        <button class="btn btn-success btn-sm"><i class="fas fa-eye"></i> </button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                                <tr>
                                <td colspan="4"><p class="text-center">No Order Available</p></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Latest Users</h4>

                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($laste_users) > 0)
                            @foreach($laste_users as $lusers)
                            <tr>
                                <td>{{$lusers->name}}</td>
                                <td>{{$lusers->email}}</td>
                                <td>{{$lusers->phone_number}}</td>
                            </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="3"><p class="text-center">No Users Available</p></td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>


@endsection
