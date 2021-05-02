@extends('layouts.user')
@section('user')
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
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">My Referral Link</h4>
                    <form class="needs-validation" novalidate="">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="myInput" placeholder="First name" value="{{route('user.referral.register',Auth::user()->my_ref_id)}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button class="btn btn-primary" type="button" onclick="myFunction()">Copy</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

    </div>





    @if (Auth::user()->is_account_veify == 1 && Auth::user()->account_type == 0)
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="#" enctype="multipart/form-data" method="post">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="alert alert-warning" role="alert">
                                   Your account is not activated now . Please Active your account .
                                </div>
                            </div>
                            <div class="col-md-2">
                                @if (Auth::user()->admin_approved == 1)
                                    <button class="btn btn-primary" type="button">Submited</button>
                                @elseif (Auth::user()->admin_approved == 3)
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" type="button">Re-Submit</button>
                                @else
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" type="button">Activate Account</button>
                                @endif

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

    </div>
    @elseif (Auth::user()->is_account_veify == 1 && Auth::user()->account_type == 1)
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" novalidate="" action="#" enctype="multipart/form-data" method="post">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="alert alert-warning" role="alert">
                                        Your account is not activated now .
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end card -->
            </div> <!-- end col -->

        </div>

    @endif

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Activate Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('user.acccount.activation.submit')}}" method="post">
                    @csrf
                <div class="modal-body">
                    <div class="form-group">
                       <img src="{{asset('assets/admin/images/wht.jpeg')}}" style="height: 200px;width: 100%">
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" class="form-control" name="amount" value="10" readonly>
                    </div>
                    <div class="form-group">
                        <label>Sender Address</label>
                        <input type="text" class="form-control" name="sender_address">
                    </div>
                    <div class="form-group">
                        <label>TRX ID</label>
                        <input type="text" class="form-control" name="trx_id">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body overflow-hidden">
                                    <p class="text-truncate font-size-14 mb-2">Delivered Orders</p>
                                    <h4 class="mb-0">{{$delivered_orders}}</h4>
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
                                    <p class="text-truncate font-size-14 mb-2">Approved Orders</p>
                                    <h4 class="mb-0">{{$approved_orders}}</h4>
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
                                    <p class="text-truncate font-size-14 mb-2">Pending orders</p>
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
                                    <p class="text-truncate font-size-14 mb-2">Rejected orders</p>
                                    <h4 class="mb-0">{{$rejected_orders}}</h4>
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
                                    <p class="text-truncate font-size-14 mb-2">Current Balance</p>
                                    <h4 class="mb-0">{{Auth::user()->current_balance}}</h4>
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
                                    <p class="text-truncate font-size-14 mb-2">Income Balance</p>
                                    <h4 class="mb-0">{{Auth::user()->income_balance}}</h4>
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
                                    <p class="text-truncate font-size-14 mb-2">Shopping Balance</p>
                                    <h4 class="mb-0">{{Auth::user()->shopping_balance}}</h4>
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
                    <h4 class="card-title">Orders</h4>

                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Total Amount</th>
                                <th>Order Status</th>
                                <th>Created Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users_orders as $userorder)
                            <tr>
                                <th scope="row">{{$userorder->order_id}}</th>
                                <td>{{$gnl->site_currency}}.{{$userorder->total_amount}}</td>
                                <td>
                                    @if($userorder->status == 1)
                                        Pending
                                    @elseif($userorder->status == 2)
                                        Approved
                                    @elseif($userorder->status == 3)
                                        Rejected
                                    @elseif($userorder->status == 4)
                                        Delivered
                                    @elseif($userorder->status == 5)
                                        Canceled
                                    @else
                                        Not Set
                                    @endif
                                </td>
                                <td>{{\Carbon\Carbon::parse($userorder->created_at)->format('Y-m-d')}}</td>
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
@section('js')
    <script>
        function myFunction() {
            var copyText = document.getElementById("myInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            swal("Your Referral Link Copied", "", "success");
        }
    </script>
@endsection
