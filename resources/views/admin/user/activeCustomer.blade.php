@extends('layouts.admin')

@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">User Management</h4>

                <div class="page-title-right">
                    <a href="{{route('admin.create.user')}}">

                        <button class="btn btn-success btn-sm">Create New User</button>
                    </a>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Ceated Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>


    </div>



    <div class="modal fade" id="deleteuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.delete.user')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are your sure delete this user ?
                            <input type="hidden" class="form-control userdelete" name="user_delete">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="modal fade" id="admoney" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Balance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.add.balance.user')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Balance Type</label>
                            <select class="form-control" name="balance_type">
                                <option value="1">Current Balance</option>
                                <option value="2">Income Balance</option>
                                <option value="3">Shopping Balance</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Enter Amount</label>
                            <input type="number" class="form-control"  name="amount">
                            <input type="hidden" class="form-control addbalance" name="add_balance">
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




        function addbalance(id) {
            $('.addbalance').val(id);
        }

        function deleteuser(id) {
            $('.userdelete').val(id);
        }

        $(document).ready(function () {

            $('#categorytable').DataTable({

                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.get.users') }}",
                columns: [
                    { data: 'name', name: 'name',class : 'text-center' },
                    { data: 'email', name: 'email',class : 'text-center' },
                    { data: 'phone_number', name: 'phone_number',class : 'text-center' },
                    { data: 'created_at', name: 'created_at',class : 'text-center' },
                    {data: 'action', name: 'action', orderable: false, searchable: false,class : 'text-center'},
                ]
            });
        })
    </script>
@endsection
