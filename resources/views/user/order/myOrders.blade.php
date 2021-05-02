@extends('layouts.user')

@section('user')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">My Order</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order List</h4>

                    <div class="table-responsive">
                        <table class="table mb-0" id="categorytable">
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Total Amount</th>
                                <th>Order Status</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>


    </div>



    <div class="modal fade" id="deletebrand" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.brand.delete')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are your sure delete this brand ?
                            <input type="hidden" class="form-control branddelete" name="brand_delete">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@section('js')
    <script>


        function deletebrand(id) {
            $('.branddelete').val(id);
        }

        $(document).ready(function () {

            $('#categorytable').DataTable({

                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('user.get.myorders') }}",
                columns: [
                    { data: 'order_id', name: 'order_id',class : 'text-center' },
                    { data: 'total_amount', name: 'total_amount',class : 'text-center' },
                    {
                        data: 'status',class : 'text-center',
                        render: function(data) {
                            if(data == 1) {
                                return "<div class='badge badge-soft-primary font-size-12'>Pending</div>";
                            }else if (data == 2){
                                return "<div class='badge badge-soft-success font-size-12'>Approved</div>";
                            }else if (data == 3){
                                return "<div class='badge badge-soft-danger font-size-12'>Rejected</div>";
                            }else if (data == 4){
                                return "<div class='badge badge-soft-success font-size-12'>Delivered</div>";
                            }else if (data == 5){
                                return "<div class='badge badge-soft-danger font-size-12'>Canceled</div>";
                            }
                            else {
                                return "<span class='label label-info label-mini text-center'>Not Set Yet</span>";
                            }

                        },
                        defaultContent: "<div class='badge badge-soft-success font-size-12'>Not Set</div>"
                    },
                    { data: 'created_at', name: 'created_at',class : 'text-center' },
                    {data: 'action', name: 'action', orderable: false, searchable: false,class : 'text-center'},
                ]
            });
        })
    </script>
@endsection
