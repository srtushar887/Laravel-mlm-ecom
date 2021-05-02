@extends('layouts.admin')

@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Verify User Account</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">User List</h4>

                    <div class="table-responsive">
                        <table class="table mb-0" id="categorytable">
                            <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Amount</th>
                                <th>Sender Address</th>
                                <th>TRX</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>


    </div>



    <div class="modal fade" id="verifyuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Activate Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.users.account.verify.submit')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>select status</label>
                            <select class="form-control" name="status">
                                <option value="0">select any</option>
                                <option value="1">Approved</option>
                                <option value="2">Rejected</option>
                            </select>
                            <input type="hidden" name="veirify_user" class="verifyuser">
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

@endsection
@section('js')
    <script>


        function verifyuser(id) {
            $('.verifyuser').val(id);
        }

        $(document).ready(function () {

            $('#categorytable').DataTable({

                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.verify.user.get') }}",
                columns: [
                    { data: 'user.name', name: 'user.name',class : 'text-center' },
                    { data: 'amount', name: 'amount',class : 'text-center' },
                    { data: 'sender_address', name: 'sender_address',class : 'text-center' },
                    { data: 'trx_id', name: 'trx_id',class : 'text-center' },
                    {
                        data: 'status',
                        render: function(data) {
                            if(data == 1) {
                                return "Pending";
                            }else if(data == 2) {
                                return "Verified";
                            }else if(data == 3) {
                                return "Rejected";
                            }
                            else {
                                return "not set";
                            }

                        },
                        defaultContent: '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0okZSQTV10ebVN9GwLfr45wbCB9tyUK_oFjmRrP9Uo000e9sU" alt="" img style="width:100%; height:100px">'
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false,class : 'text-center'},
                ]
            });
        })
    </script>
@endsection
