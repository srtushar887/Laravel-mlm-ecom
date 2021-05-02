@extends('layouts.admin')

@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">User Account Activation</h4>

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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>NID Number</th>
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



@endsection
@section('js')
    <script>


        function deleteuser(id) {
            $('.userdelete').val(id);
        }

        $(document).ready(function () {

            $('#categorytable').DataTable({

                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.get.users.account.activation') }}",
                columns: [
                    { data: 'name', name: 'name',class : 'text-center' },
                    { data: 'email', name: 'email',class : 'text-center' },
                    { data: 'phone_number', name: 'phone_number',class : 'text-center' },
                    { data: 'nid_number', name: 'nid_number',class : 'text-center' },
                    { data: 'created_at', name: 'created_at',class : 'text-center' },
                    {data: 'action', name: 'action', orderable: false, searchable: false,class : 'text-center'},
                ]
            });
        })
    </script>
@endsection
