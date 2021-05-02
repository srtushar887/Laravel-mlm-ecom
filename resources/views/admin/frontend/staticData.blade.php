@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Static Data</h4>

                <div class="page-title-right">
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="{{route('admin.static.data.update')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom01">About Us</label>
                                    <textarea type="text" cols="5" rows="5" class="form-control" name="about_us" id="summary-ckeditor-about">{!! $sdata->about_us !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom01">Site Address</label>
                                    <textarea type="text" cols="5" rows="5" class="form-control" name="privacy_policy" id="summary-ckeditor-pri">{!! $sdata->privacy_policy !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom01">Site Address</label>
                                    <textarea type="text" cols="5" rows="5" class="form-control" name="terms_condition" id="summary-ckeditor-trem">{!! $sdata->terms_condition !!}</textarea>
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
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor-about' );
        CKEDITOR.replace( 'summary-ckeditor-pri' );
        CKEDITOR.replace( 'summary-ckeditor-trem' );
    </script>
@stop
