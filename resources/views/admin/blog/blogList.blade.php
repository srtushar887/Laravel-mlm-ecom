@extends('layouts.admin')

@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Blog Management</h4>

                <div class="page-title-right">
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#createblog">Create New</button>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Blog List</h4>

                    <div class="table-responsive">
                        <table class="table mb-0" id="categorytable">
                            <thead>

                            <tr>
                                <th>Title</th>
                                <th>Blog Image</th>
                                <th>Action</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($all_blogs as $blogs)
                            <tr>
                                <th>{{$blogs->title}}</th>
                                <th><img src="{{asset($blogs->blog_image)}}" style="height: 50px;width: 50px;"></th>
                                <th>
                                    <button  class="btn btn-success btn-sm" data-toggle="modal" data-target="#updateblog{{$blogs->id}}"><i class="fas fa-edit"></i> </button>
                                    <button  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteblog{{$blogs->id}}"><i class="fas fa-trash"></i> </button>
                                </th>
                            </tr>


                            <div class="modal fade" id="updateblog{{$blogs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Update Blog</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('admin.blog.update')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Blog Title</label>
                                                    <input type="text" class="form-control" name="title" value="{{$blogs->title}}">
                                                    <input type="hidden" class="form-control" name="blog_edit" value="{{$blogs->id}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Blog Description</label>
                                                    <textarea type="text" class="form-control" name="desc" id="summary-ckeditor-desc2">{!! $blogs->desc !!}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Blog Image</label>
                                                    <br>
                                                    <img src="{{asset($blogs->blog_image)}}" style="height: 100px;width: 100px;">
                                                    <input type="file" class="form-control" name="blog_image">
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

                            <div class="modal fade" id="deleteblog{{$blogs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Delete Blog</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('admin.blog.delete')}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    are your sure delete this blog ?
                                                    <input type="hidden" class="form-control branddelete" name="blog_delete" value="{{$blogs->id}}">
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

                            @endforeach
                            </tbody>
                        </table>
                        {{$all_blogs->links()}}
                    </div>

                </div>
            </div>
        </div>


    </div>





    <div class="modal fade" id="createblog" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Blog</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.blog.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Blog Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label>Blog Description</label>
                            <textarea type="text" class="form-control" name="desc" id="summary-ckeditor-desc"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Blog Image</label>
                            <input type="file" class="form-control" name="blog_image">
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
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor-desc' );
        CKEDITOR.replace( 'summary-ckeditor-desc2' );
    </script>
@endsection

