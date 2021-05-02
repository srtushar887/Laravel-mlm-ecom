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
                    <li class="active">Blog Details</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>


    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="blog-page">
                    <div class="col-md-12">
                        <div class="blog-post wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                            @if(!empty($blog->blog_image) && file_exists($blog->blog_image))
                            <img class="img-responsive" src="{{asset($blog->blog_image)}}" alt="" style="height: 471px;">
                            @endif
                            <h1>{!! $blog->title !!}</h1>
                            <span class="review">{{$comment_count}} Comments</span>
                            <span class="date-time"> {{$blog->created_at->diffforhumans()}}</span>
                            <p>{!! $blog->desc !!}</p>
                        </div>
                        <br>
                        <div class="blog-write-comment outer-bottom-xs outer-top-xs">
                            <form action="{{route('blog.comment.save')}}" method="post">
                                @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Leave A Comment</h4>
                                </div>
                                <div class="col-md-12">
                                    <form class="register-form" role="form">
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputName">Your Name <span>*</span></label>
                                            <input type="text" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="" name="name">
                                            <input type="hidden" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="" name="blog_rev_id" value="{{$blog->id}}">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputComments">Your Comments <span>*</span></label>
                                            <textarea class="form-control unicase-form-control"  name="desc"></textarea>
                                        </div>

                                </div>
                                <div class="col-md-12 outer-bottom-small m-t-20">
                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit Comment</button>
                                </div>
                            </div>
                            </form>
                        </div>

                        <br>
                        @foreach($comments as $com)
                        <div class="blog-post-author-details wow fadeInUp" style="visibility: hidden; animation-name: none;">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4><strong>{{$com->name}}</strong></h4>
                                    <p>{!! $com->desc !!}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        @endforeach


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
