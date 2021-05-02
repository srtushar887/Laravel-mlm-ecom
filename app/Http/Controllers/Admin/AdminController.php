<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\general_setting;
use App\Models\product;
use App\Models\User;
use App\Models\user_order;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index()
    {
        $total_users = User::count();
        $total_product = product::count();
        $total_orders = user_order::count();
        $total_orders_delivered = user_order::where('status',4)->count();

        $laste_orders = user_order::where('status',1)
            ->with('user')
            ->orderBy('id','desc')
            ->take(5)
            ->get();

        $laste_users = User::take(5)->orderBy('id','desc')->get();

        return view('admin.index',compact('total_users','total_product','total_orders','total_orders_delivered','laste_orders','laste_users'));
    }

    public function general_settings()
    {
        $gen = general_setting::first();
        return view('admin.pages.generalSettings',compact('gen'));
    }


    public function general_settings_update(Request $request)
    {
        $gen = general_setting::first();
        if($request->hasFile('site_logo')){
            @unlink($gen->site_logo);
            $image = $request->file('site_logo');
            $imageName = time().uniqid().'.png';
            $directory = 'assets/admin/images/logo/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $gen->site_logo = $imgUrl;
        }
        if($request->hasFile('site_icon')){
            @unlink($gen->site_icon);
            $image = $request->file('site_icon');
            $imageName = time().uniqid().'.png';
            $directory = 'assets/admin/images/logo/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $gen->site_icon = $imgUrl;
        }

        $gen->site_name = $request->site_name;
        $gen->site_email = $request->site_email;
        $gen->site_phone_number = $request->site_phone_number;
        $gen->site_address = $request->site_address;
        $gen->user_email_verify = $request->user_email_verify;
        $gen->user_login = $request->user_login;
        $gen->site_currency = $request->site_currency;
        $gen->save();

        return back()->with('success','General Settings Successfully Updated');

    }
}
