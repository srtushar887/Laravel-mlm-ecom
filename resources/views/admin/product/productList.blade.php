@extends('layouts.admin')

@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Products</h4>

                <div class="page-title-right">
                    <a href="{{route('admin.product.create')}}">
                        <button class="btn btn-success btn-sm">Create New</button>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Product List</h4>

                    <div class="table-responsive">
                        <table class="table mb-0" id="categorytable">
                            <thead>
                            <tr>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product Qty</th>
                                <th>Product Purchase Price</th>
                                <th>Product Sell Price</th>
                                <th>Product Old Price</th>
                                <th>Product Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>


    </div>




    <div class="modal fade" id="deletecolor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Size</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.color.delete')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are your sure delete this product ?
                            <input type="hidden" class="form-control colordelete" name="color_delete">
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


        function deletecolor(id) {
            $('.colordelete').val(id);
        }

        $(document).ready(function () {

            $('#categorytable').DataTable({

                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.get.products') }}",
                columns: [
                    {
                        data: 'product_main_image',
                        render: function(data) {
                            if(data == null) {
                                return '<img src="https://dirtbusters.co.uk/images/default/product.png" alt="" img style="width:100px; height:100px">';
                            }else {
                                return '<img src="{{url('/')}}/'+data+'" alt="" img style="width:100px; height:100px">';
                            }

                        },
                        defaultContent: '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0okZSQTV10ebVN9GwLfr45wbCB9tyUK_oFjmRrP9Uo000e9sU" alt="" img style="width:100%; height:100px">'
                    },
                    { data: 'product_name', name: 'product_name',class : 'text-center' },
                    { data: 'product_qty', name: 'product_qty',class : 'text-center' },
                    { data: 'product_purchase_price', name: 'product_purchase_price',class : 'text-center' },
                    { data: 'product_sell_price', name: 'product_sell_price',class : 'text-center' },
                    { data: 'product_old_price', name: 'product_old_price',class : 'text-center' },
                    {
                        data: 'product_status',
                        render: function(data) {
                            if(data == 1) {
                                return "<span class='label label-info label-mini text-center'>Publish</span>";
                            }else if (data == 2){
                                return "<span class='label label-info label-mini text-center'>Unpublish</span>";
                            }
                            else {
                                return "<span class='label label-info label-mini text-center'>Not Set Yet</span>";
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
