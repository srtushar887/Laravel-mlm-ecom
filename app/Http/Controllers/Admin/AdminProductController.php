<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\brand;
use App\Models\category;
use App\Models\color;
use App\Models\product;
use App\Models\product_color;
use App\Models\product_size;
use App\Models\size;
use App\Models\sub_category;
use App\Models\sub_sub_category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;

class AdminProductController extends Controller
{
    public function product()
    {
        return view('admin.product.productList');
    }


    public function product_get()
    {
        $all_product = product::latest();
        return DataTables::of($all_product)
            ->addColumn('action',function ($all_product){
                return ' <a href="'.route('admin.product.edit',$all_product->id).'"> <button  class="btn btn-success btn-info btn-sm" ><i class="fas fa-edit"></i> </button></a>
                        <button id="'.$all_product->id .'" onclick="deletecolor(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deletecolor"><i class="far fa-trash-alt"></i> </button>';
            })
            ->make(true);
    }


    public function product_create()
    {
        $category = category::all();
        $sub_category = sub_category::all();
        $sub_sub_category = sub_sub_category::all();
        $colors = color::all();
        $sized = size::all();
        $brands = brand::all();
        return view('admin.product.productCreated',compact('category','sub_category','sub_sub_category','colors','sized','brands'));

    }

    public function product_save(Request $request)
    {
        $product = new product();

        if($request->hasFile('product_main_image')){
            $image = $request->file('product_main_image');
            $imageName = time().uniqid().'.jpeg';
            $directory = 'assets/admin/images/products/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $product->product_main_image = $imgUrl;
        }

        if($request->hasFile('product_image_one')){
            $image = $request->file('product_image_one');
            $imageName = time().uniqid().'.jpeg';
            $directory = 'assets/admin/images/products/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $product->product_image_one = $imgUrl;
        }

        if($request->hasFile('product_image_two')){
            $image = $request->file('product_image_two');
            $imageName = time().uniqid().'.jpeg';
            $directory = 'assets/admin/images/products/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $product->product_image_two = $imgUrl;
        }

        if($request->hasFile('product_image_three')){
            $image = $request->file('product_image_three');
            $imageName = time().uniqid().'.jpeg';
            $directory = 'assets/admin/images/products/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $product->product_image_three = $imgUrl;
        }

        if($request->hasFile('product_image_four')){
            $image = $request->file('product_image_four');
            $imageName = time().uniqid().'.jpeg';
            $directory = 'assets/admin/images/products/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $product->product_image_four = $imgUrl;
        }

        if($request->hasFile('product_image_five')){
            $image = $request->file('product_image_five');
            $imageName = time().uniqid().'.jpeg';
            $directory = 'assets/admin/images/products/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $product->product_image_five = $imgUrl;
        }


        $product->product_name = $request->product_name;
        $product->product_slug = Str::slug($request->product_name,'-');
        $product->product_purchase_price = $request->product_purchase_price;
        $product->product_sell_price = $request->product_sell_price;
        $product->product_old_price = $request->product_old_price;
        $product->product_category_id = $request->product_category_id;
        $product->product_sub_category_id = $request->product_sub_category_id;
        $product->product_sub_sub_category_id = $request->product_sub_sub_category_id;
        $product->product_brand_id = $request->product_brand_id;
        $product->product_long_description = $request->product_long_description;
        $product->product_sort_description = $request->product_sort_description;
        $product->product_qty = $request->product_qty;
        $product->is_new = $request->is_new;
        $product->is_featured = $request->is_featured;
        $product->product_status = $request->product_status;
        $product->save();


        $color_data = $request->color_id;
        for ($i=0;$i<count($color_data);$i++){
            $new_prc_ac = new product_color();
            $new_prc_ac->product_id = $product->id;
            $new_prc_ac->color_id = $color_data[$i];
            $new_prc_ac->save();
        }


        $size_data = $request->size_id;
        for ($i=0;$i<count($size_data);$i++){
            $new_prc_ac = new product_size();
            $new_prc_ac->product_id = $product->id;
            $new_prc_ac->size_id = $size_data[$i];
            $new_prc_ac->save();
        }


        return back()->with('success','Product Successfully Created');

    }


    public function product_edit($id)
    {
        $category = category::all();
        $sub_category = sub_category::all();
        $sub_sub_category = sub_sub_category::all();
        $colors = color::all();
        $sized = size::all();
        $brands = brand::all();
        $product = product::where('id',$id)->first();
        return view('admin.product.productEdit',compact('category','sub_category','sub_sub_category','colors','sized','brands','product'));

    }


    public function product_update(Request $request)
    {
        $product = product::where('id',$request->product_edit)->first();

        if($request->hasFile('product_main_image')){
            @unlink($product->product_main_image);
            $image = $request->file('product_main_image');
            $imageName = time().uniqid().'.jpeg';
            $directory = 'assets/admin/images/products/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $product->product_main_image = $imgUrl;
        }

        if($request->hasFile('product_image_one')){
            @unlink($product->product_image_one);
            $image = $request->file('product_image_one');
            $imageName = time().uniqid().'.jpeg';
            $directory = 'assets/admin/images/products/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $product->product_image_one = $imgUrl;
        }

        if($request->hasFile('product_image_two')){
            @unlink($product->product_image_two);
            $image = $request->file('product_image_two');
            $imageName = time().uniqid().'.jpeg';
            $directory = 'assets/admin/images/products/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $product->product_image_two = $imgUrl;
        }

        if($request->hasFile('product_image_three')){
            @unlink($product->product_image_three);
            $image = $request->file('product_image_three');
            $imageName = time().uniqid().'.jpeg';
            $directory = 'assets/admin/images/products/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $product->product_image_three = $imgUrl;
        }

        if($request->hasFile('product_image_four')){
            @unlink($product->product_image_four);
            $image = $request->file('product_image_four');
            $imageName = time().uniqid().'.jpeg';
            $directory = 'assets/admin/images/products/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $product->product_image_four = $imgUrl;
        }

        if($request->hasFile('product_image_five')){
            @unlink($product->product_image_five);
            $image = $request->file('product_image_five');
            $imageName = time().uniqid().'.jpeg';
            $directory = 'assets/admin/images/products/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $product->product_image_five = $imgUrl;
        }


        $product->product_name = $request->product_name;
        $product->product_slug = Str::slug($request->product_name,'-');
        $product->product_purchase_price = $request->product_purchase_price;
        $product->product_sell_price = $request->product_sell_price;
        $product->product_old_price = $request->product_old_price;
        $product->product_category_id = $request->product_category_id;
        $product->product_sub_category_id = $request->product_sub_category_id;
        $product->product_sub_sub_category_id = $request->product_sub_sub_category_id;
        $product->product_brand_id = $request->product_brand_id;
        $product->product_long_description = $request->product_long_description;
        $product->product_sort_description = $request->product_sort_description;
        $product->product_qty = $request->product_qty;
        $product->is_new = $request->is_new;
        $product->is_featured = $request->is_featured;
        $product->product_status = $request->product_status;
        $product->save();






        $color_data = $request->color_id;
        product_color::where('product_id',$product->id)->delete();
        if (isset($color_data)){

            for ($i=0;$i<count($color_data);$i++){
                $new_prc_ac = new product_color();
                $new_prc_ac->product_id = $product->id;
                $new_prc_ac->color_id = $color_data[$i];
                $new_prc_ac->save();
            }
        }



        $size_data = $request->size_id;
        product_size::where('product_id',$product->id)->delete();
        if (isset($size_data)){

            for ($i=0;$i<count($size_data);$i++){
                $new_prc_ac = new product_size();
                $new_prc_ac->product_id = $product->id;
                $new_prc_ac->size_id = $size_data[$i];
                $new_prc_ac->save();
            }
        }

        return back()->with('success','Product Successfully Created');
    }
}
