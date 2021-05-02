@extends('layouts.user')

@section('user')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">My Created User List</h4>

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
                                <th>User Email</th>
                                <th>User Phone Number</th>
                                <th>User NID Number</th>
                                <th>Account Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td>{{$user->nid_number}}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td>
                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#sendmoney{{$user->id}}"><i class="fas fa-money-bill"></i> </button>
                                    </td>
                                </tr>



                                <div class="modal fade" id="sendmoney{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Send Money</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('user.send.money')}}" method="post">
                                                @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Enter Amount</label>
                                                    <input type="number" name="amount" class="form-control">
                                                    <input type="hidden" name="user_id" value="{{$user->id}}" class="form-control">
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
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>


    </div>

@endsection
