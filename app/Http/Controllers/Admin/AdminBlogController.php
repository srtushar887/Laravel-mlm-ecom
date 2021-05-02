<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\blog;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminBlogController extends Controller
{
    public function blog()
    {
        $all_blogs = blog::orderBy('id','desc')->paginate(10);
        return view('admin.blog.blogList',compact('all_blogs'));
    }

    public function blog_save(Request $request)
    {
        $new_blog = new blog();
        if($request->hasFile('blog_image')){
//            @unlink($gen->site_logo);
            $image = $request->file('blog_image');
            $imageName = time().uniqid().'.png';
            $directory = 'assets/admin/images/blog/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_blog->blog_image = $imgUrl;
        }
        $new_blog->title = $request->title;
        $new_blog->desc = $request->desc;
        $new_blog->save();

        return back()->with('success','Blog Successfully Created');


    }


    public function blog_Update(Request $request){
        $update_blog = blog::where('id',$request->blog_edit)->first();
        if($request->hasFile('blog_image')){
            @unlink($update_blog->site_logo);
            $image = $request->file('blog_image');
            $imageName = time().uniqid().'.png';
            $directory = 'assets/admin/images/blog/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $update_blog->blog_image = $imgUrl;
        }
        $update_blog->title = $request->title;
        $update_blog->desc = $request->desc;
        $update_blog->save();

        return back()->with('success','Blog Successfully Updated');
    }

    public function blog_delete(Request $request)
    {
        $delete_blog = blog::where('id',$request->blog_delete)->first();
        @unlink($delete_blog->site_logo);
        $delete_blog->delete();
        return back()->with('success','Blog Successfully Deleted');
    }



}
