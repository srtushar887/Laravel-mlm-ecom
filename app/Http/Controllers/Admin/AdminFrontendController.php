<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\all_static_data;
use App\Models\home_slider;
use App\Models\static_data;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminFrontendController extends Controller
{
    public function home_slider()
    {
        $sliders = home_slider::paginate(10);
        return view('admin.frontend.homeSlider',compact('sliders'));
    }

    public function home_slider_save(Request $request)
    {
        $new_slider = new home_slider();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().uniqid().'.png';
            $directory = 'assets/admin/images/slider/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_slider->image = $imgUrl;
        }

        $new_slider->title = $request->title;
        $new_slider->sub_title = $request->sub_title;
        $new_slider->save();

        return back()->with('success','Home Slider Successfully Created');

    }


    public function home_slider_update(Request $request)
    {
        $update_slider = home_slider::where('id',$request->edit_slider)->first();
        if($request->hasFile('image')){
            @unlink($update_slider->image);
            $image = $request->file('image');
            $imageName = time().uniqid().'.png';
            $directory = 'assets/admin/images/slider/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $update_slider->image = $imgUrl;
        }

        $update_slider->title = $request->title;
        $update_slider->sub_title = $request->sub_title;
        $update_slider->save();

        return back()->with('success','Home Slider Successfully Updated');
    }


    public function home_slider_delete(Request $request)
    {
        $delete_slider = home_slider::where('id',$request->delete_slider)->first();
        @unlink($delete_slider->image);
        $delete_slider->delete();
        return back()->with('success','Home Slider Successfully Deleted');
    }


    public function static_data()
    {
        $sdata = all_static_data::first();
        return view('admin.frontend.staticData',compact('sdata'));
    }

    public function static_data_update(Request $request)
    {
        $staic_data = all_static_data::first();
        $staic_data->about_us = $request->about_us;
        $staic_data->privacy_policy = $request->privacy_policy;
        $staic_data->terms_condition = $request->terms_condition;
        $staic_data->save();
        return back()->with('success','Static Data Successfully Updated');
    }
}
