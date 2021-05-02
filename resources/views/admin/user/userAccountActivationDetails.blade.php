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
                    <form class="needs-validation" novalidate="" action="{{route('admin.user.activation.details.save')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="validationCustom01">User Name</label>
                                    <input type="text" class="form-control"  name="name" value="{{$user->name}}">
                                    <input type="hidden" class="form-control"  name="edit_user" value="{{$user->id}}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="validationCustom01">User Email</label>
                                    <input type="text" class="form-control"  name="email" value="{{$user->email}}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="validationCustom01">User Phone Number</label>
                                    <input type="text" class="form-control"  name="phone_number" value="{{$user->phone_number}}" >
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="validationCustom01">User NID Number</label>
                                    <input type="text" class="form-control"  name="nid_number" value="{{$user->nid_number}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">User NID Front Image</label>
                                    <br>
                                    <img src="{{asset($user->nid_frond_image)}}" style="height: 100px;width: 100px;">
                                    <a href="{{asset($user->nid_frond_image)}}" download>Download Image</a>
                                    <input type="text" class="form-control"  name="nid_frond_image" >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">User NID Back Image</label>
                                    <br>
                                    <img src="{{asset($user->nid_back_image)}}" style="height: 100px;width: 100px;">
                                    <a href="{{asset($user->nid_back_image)}}" download>Download Image</a>
                                    <input type="text" class="form-control"  name="nid_back_image" >
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom01">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="0">select any</option>
                                        <option value="1" {{$user->admin_approved == 1 ? 'selected' : ''}}>Approved</option>
                                        <option value="2" {{$user->admin_approved == 2 ? 'selected' : ''}}>Rejected</option>
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
