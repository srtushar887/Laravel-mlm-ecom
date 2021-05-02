@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">User Details</h4>

                <div class="page-title-right">
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="{{route('admin.user.details.update')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">Name</label>
                                    <input type="text" class="form-control"  name="name" value="{{$user->name}}">
                                    <input type="hidden" class="form-control"  name="user_edit" value="{{$user->id}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">Email</label>
                                    <input type="text" class="form-control"  name="email" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">Phone Number</label>
                                    <input type="text" class="form-control"  name="phone_number" value="{{$user->phone_number}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">Account Status</label>
                                    <select class="form-control" name="account_type">
                                        <option value="0">select any</option>
                                        <option value="1" {{$user->account_type == 1 ? 'selected' : ''}}>Active</option>
                                        <option value="2" {{$user->account_type == 2 ? 'selected' : ''}}>Blocked</option>
                                    </select>
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
