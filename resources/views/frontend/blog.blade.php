@extends('layouts.frontend')
@section('search')
    <div class="search-area">
        <form action="{{route('search.product')}}" method="get">
            @csrf
            <div class="control-group">
                <input class="search-field" name="search" placeholder="Search Product here..."  />
                <button type="submit" class="search-button"></button>
            </div>
        </form>
    </div>
@endsection
@section('front')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>All Products</li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>
    <div class="body-content" >
        <div class="container">
            <div class="row ">
                <div class="blog-page "style="margin-top: -26px;">
                    <div class="col-md-12" >

                        @foreach($blogs as $blog)

                            <div class="blog-post outer-top-bd  wow fadeInUp" >
                                <a href="{{route('blog.details',$blog->id)}}">
                                    @if(!empty($blog->blog_image) && file_exists($blog->blog_image))
                                        <img class="img-responsive" src="{{asset($blog->blog_image)}}" alt="" style="height: 471px;">
                                    @endif
                                </a>
                                <h1><a href="{{route('blog.details',$blog->id)}}">{!! $blog->title !!}</a></h1>
                                <span class="author">Admin</span>
                                <?php
                                    $count_comment = \App\Models\blog_comment::where('blog_id',$blog->id)->count();
                                ?>
                                <span class="review">{{$count_comment}} Comments</span>
                                <span class="date-time">{{$blog->created_at->diffforhumans()}}</span>
                                <p>{!! $blog->desc !!}</p>
                                <a href="{{route('blog.details',$blog->id)}}" class="btn btn-upper btn-primary read-more">read more</a>
                            </div>
                        @endforeach

                        <div class="clearfix blog-pagination filters-container  wow fadeInUp"
                             style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">

                            <div class="text-right">
                                {{$blogs->links()}}
                            </div><!-- /.text-right -->

                        </div><!-- /.filters-container -->
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
