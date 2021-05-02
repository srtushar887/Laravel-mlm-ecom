@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://www.virtuosoft.eu/code/bootstrap-duallistbox/bootstrap-duallistbox/v3.0.2/bootstrap-duallistbox.css">

    <style>
        .moveall,
        .removeall {
            border: 1px solid #ccc !important;

        &:hover {
             background: #efefef;
         }
        }



        .moveall::after {
            content: attr(title);

        }

        .removeall::after {
            content: attr(title);
        }

        .form-control option {
            padding: 10px;
            border-bottom: 1px solid #efefef;
        }</style>
    @endsection
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Create New Product</h4>

                <div class="page-title-right">
                    <a href="{{route('admin.product')}}">
                        <button class="btn btn-success btn-sm">Go Back</button>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="{{route('admin.product.save')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom01">Product Name</label>
                                    <input type="text" class="form-control"  name="product_name" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">Product Purchase Price</label>
                                    <input type="text" class="form-control"  name="product_purchase_price" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">Product Sell Price</label>
                                    <input type="text" class="form-control"  name="product_sell_price" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">Product Old Price</label>
                                    <input type="text" class="form-control"  name="product_old_price" >
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="validationCustom01">Product Category</label>
                                    <select class="form-control" name="product_category_id">
                                        <option value="">select any</option>
                                        @foreach($category as $cat)
                                            <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="validationCustom01">Product Sub-Category</label>
                                    <select class="form-control" name="product_sub_category_id">
                                        <option value="">select any</option>
                                        @foreach($sub_category as $subcat)
                                            <option value="{{$subcat->id}}">{{$subcat->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="validationCustom01">Product Sub-Sub-Category</label>
                                    <select class="form-control" name="product_sub_sub_category_id">
                                        <option value="">select any</option>
                                        @foreach($sub_sub_category as $susbcat)
                                            <option value="{{$susbcat->id}}">{{$susbcat->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="validationCustom01">Product Brand</label>
                                    <select class="form-control" name="product_brand_id">
                                        <option value="">select any</option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <select multiple="multiple" size="10" name="color_id[]" title="duallistbox_demo1[]">
                                        @foreach($colors as $color)
                                            <option value="{{$color->id}}">{{$color->color_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <select multiple="multiple" size="10" name="size_id[]" title="duallistbox_demo2[]">
                                        @foreach($sized as $size)
                                            <option value="{{$size->id}}">{{$size->size_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">Product Main Image</label>
                                    <br>
                                    <img src="https://www.chanchao.com.tw/images/default.jpg" style="height: 100px;width: 100px;">
                                    <input type="file" class="form-control"  name="product_main_image" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">Product Image One (optional)</label>
                                    <br>
                                    <img src="https://www.chanchao.com.tw/images/default.jpg" style="height: 100px;width: 100px;">
                                    <input type="file" class="form-control"  name="product_image_one" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">Product Image Two (optional)</label>
                                    <br>
                                    <img src="https://www.chanchao.com.tw/images/default.jpg" style="height: 100px;width: 100px;">
                                    <input type="file" class="form-control"  name="product_image_two" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">Product Image Three (optional)</label>
                                    <br>
                                    <img src="https://www.chanchao.com.tw/images/default.jpg" style="height: 100px;width: 100px;">
                                    <input type="file" class="form-control"  name="product_image_three" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">Product Image Four (optional)</label>
                                    <br>
                                    <img src="https://www.chanchao.com.tw/images/default.jpg" style="height: 100px;width: 100px;">
                                    <input type="file" class="form-control"  name="product_image_four" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">Product Image Five (optional)</label>
                                    <br>
                                    <img src="https://www.chanchao.com.tw/images/default.jpg" style="height: 100px;width: 100px;">
                                    <input type="file" class="form-control"  name="product_image_five" >
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom01">Product Long Description</label>
                                    <textarea type="text" class="form-control"  name="product_long_description" ></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom01">Product Sort Description</label>
                                    <textarea type="text" class="form-control"  name="product_sort_description" ></textarea>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="validationCustom01">Product Qty</label>
                                    <input type="number" class="form-control"  name="product_qty" >
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="validationCustom01">Is New Product</label>
                                    <select class="form-control" name="is_new">
                                        <option value="">select any</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="validationCustom01">Is Featured</label>
                                    <select class="form-control" name="is_featured">
                                        <option value="">select any</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="validationCustom01">Product Status</label>
                                    <select class="form-control" name="product_status">
                                        <option value="">select any</option>
                                        <option value="1">Publish</option>
                                        <option value="2">Un-Publish</option>
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
@section('js')
    <script src="https://www.virtuosoft.eu/code/bootstrap-duallistbox/bootstrap-duallistbox/v3.0.2/jquery.bootstrap-duallistbox.js"></script>
    <script>
        var demo1 = $('select[name="color_id[]"]').bootstrapDualListbox({
            nonSelectedListLabel: 'All Color',
            selectedListLabel: 'Assign Color',
            preserveSelectionOnMove: 'moved',
            moveAllLabel: 'Move all',
            removeAllLabel: 'Remove all'
        });


        var demo2 = $('select[name="size_id[]"]').bootstrapDualListbox({
            nonSelectedListLabel: 'All Size',
            selectedListLabel: 'Assign Size',
            preserveSelectionOnMove: 'moved',
            moveAllLabel: 'Move all',
            removeAllLabel: 'Remove all'
        });


        $("#demoform").submit(function() {
            alert($('[name="practice_id[]"]').val());
            return false;
        });
    </script>
@endsection
