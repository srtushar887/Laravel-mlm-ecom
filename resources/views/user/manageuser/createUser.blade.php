@extends('layouts.user')
@section('user')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Create User</h4>

                <div class="page-title-right">
                </div>

            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="{{route('user.create.user.save')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">User Name</label>
                                    <input type="text" class="form-control"  name="name" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">User Email</label>
                                    <input type="text" class="form-control"  name="email" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">User Phone Number</label>
                                    <input type="text" class="form-control"  name="phone_number" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">User NID Number</label>
                                    <input type="text" class="form-control"  name="nid_number" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">User NID Front Image</label>
                                    <input type="file" class="form-control"  name="nid_frond_image" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">User NID Back Image</label>
                                    <input type="file" class="form-control"  name="nid_back_image" >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">User Account Password</label>
                                    <input type="password" class="form-control"  name="password" >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">Confirm Password</label>
                                    <input type="password" class="form-control"  name="confirm_password" >
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

    </div>

@endsection
