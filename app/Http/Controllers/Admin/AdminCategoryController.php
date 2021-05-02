<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\brand;
use App\Models\category;
use App\Models\color;
use App\Models\size;
use App\Models\sub_category;
use App\Models\sub_sub_category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class AdminCategoryController extends Controller
{
    public function category()
    {
        return view('admin.masterdata.category');
    }


    public function category_get()
    {
        $all_cat = category::latest();
        return DataTables::of($all_cat)
            ->addColumn('action',function ($all_cat){
                return ' <button id="'.$all_cat->id .'" onclick="editcategory(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#editcategory"><i class="fas fa-edit"></i> </button>
                        <button id="'.$all_cat->id .'" onclick="deletecategory(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deletecategory"><i class="far fa-trash-alt"></i> </button>';
            })
            ->make(true);
    }


    public function category_save(Request $request)
    {
        $new_category = new category();
        $new_category->cat_slug = Str::slug($request->category_name,'-');
        $new_category->category_name = $request->category_name;
        $new_category->save();
        return back()->with('success','Category Successfully Created');
    }


    public function category_single(Request $request)
    {
        $single_category = category::where('id',$request->id)->first();
        return $single_category;
    }

    public function category_update(Request $request)
    {
        $update_category = category::where('id',$request->category_edit)->first();
        $update_category->cat_slug = Str::slug($request->category_name,'-');
        $update_category->category_name = $request->category_name;
        $update_category->save();
        return back()->with('success','Category Successfully Updated');
    }

    public function category_delete(Request $request)
    {
        $delete_category = category::where('id',$request->category_delete)->first();
        $delete_category->delete();
        return back()->with('success','Category Successfully Deleted');
    }



    public function sub_category()
    {
        $categories = category::all();
        return view('admin.masterdata.subCategory',compact('categories'));
    }


    public function sub_category_get()
    {
        $all_sub_cat = sub_category::with('category')->get();
        return DataTables::of($all_sub_cat)
            ->addColumn('action',function ($all_sub_cat){
                return ' <button id="'.$all_sub_cat->id .'" onclick="editsubcategory(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#editsubcategory"><i class="fas fa-edit"></i> </button>
                        <button id="'.$all_sub_cat->id .'" onclick="deletesubcategory(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deletesubcategory"><i class="far fa-trash-alt"></i> </button>';
            })
            ->make(true);
    }



    public function sub_category_save(Request $request)
    {
        $new_sub_cat = new sub_category();
        $new_sub_cat->category_id = $request->category_id;
        $new_sub_cat->cat_slug = Str::slug($request->category_name,'-');
        $new_sub_cat->category_name = $request->category_name;
        $new_sub_cat->save();
        return back()->with('success','Sub Category Successfully Created');
    }

    public function sub_category_single(Request $request)
    {
        $single_sub_cat = sub_category::where('id',$request->id)->first();
        return $single_sub_cat;
    }


    public function sub_category_update(Request $request)
    {
        $sub_cat_update = sub_category::where('id',$request->subcategory_edit)->first();
        $sub_cat_update->category_id = $request->category_id;
        $sub_cat_update->cat_slug = Str::slug($request->category_name,'-');
        $sub_cat_update->category_name = $request->category_name;
        $sub_cat_update->save();
        return back()->with('success','Sub Category Successfully Updated');
    }


    public function sub_category_delete(Request $request)
    {
        $sub_cat_del = sub_category::where('id',$request->sub_category_delete)->first();
        $sub_cat_del->delete();
        return back()->with('success','Sub Category Successfully Deleted');
    }


    public function sub_sub_category()
    {
        $categories = category::all();
        $sub_categories = sub_category::all();
        return view('admin.masterdata.SubSubcategory',compact('categories','sub_categories'));
    }

    public function sub_sub_category_get()
    {
        $all_subsub__cat = sub_sub_category::with('category')->with('sub_cat')->get();
        return DataTables::of($all_subsub__cat)
            ->addColumn('action',function ($all_subsub__cat){
                return ' <button id="'.$all_subsub__cat->id .'" onclick="editsubsubcategory(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#editsubsubcategory"><i class="fas fa-edit"></i> </button>
                        <button id="'.$all_subsub__cat->id .'" onclick="deletesubsubcategory(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deletesubsubcategory"><i class="far fa-trash-alt"></i> </button>';
            })
            ->make(true);
    }



    public function sub_sub_category_save(Request $request)
    {
        $new_sub_cat = new sub_sub_category();
        $new_sub_cat->category_id = $request->category_id;
        $new_sub_cat->sub_category_id = $request->sub_category_id;
        $new_sub_cat->cat_slug = Str::slug($request->category_name,'-');
        $new_sub_cat->category_name = $request->category_name;
        $new_sub_cat->save();
        return back()->with('success','Sub-Sub Category Successfully Created');
    }

    public function sub_sub_category_single(Request $request)
    {
        $single_sub_cat = sub_sub_category::where('id',$request->id)->first();
        return $single_sub_cat;
    }


    public function sub_sub_category_update(Request $request)
    {
        $single_sub_cat_update = sub_sub_category::where('id',$request->sub_subcategory_edit)->first();
        $single_sub_cat_update->category_id = $request->category_id;
        $single_sub_cat_update->sub_category_id = $request->sub_category_id;
        $single_sub_cat_update->cat_slug = Str::slug($request->category_name,'-');
        $single_sub_cat_update->category_name = $request->category_name;
        $single_sub_cat_update->save();
        return back()->with('success','Sub-Sub Category Successfully Updated');
    }

    public function sub_sub_category_delete(Request $request)
    {
        $sub_sub_cat_delete = sub_sub_category::where('id',$request->sub_sub_category_delete)->first();
        $sub_sub_cat_delete->delete();
        return back()->with('success','Sub-Sub Category Successfully Deleted');
    }

    public function brand()
    {
        return view('admin.masterdata.brand');
    }

    public function brand_get()
    {
        $all_brand = brand::latest();
        return DataTables::of($all_brand)
            ->addColumn('action',function ($all_brand){
                return ' <button id="'.$all_brand->id .'" onclick="editbrand(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#editbrand"><i class="fas fa-edit"></i> </button>
                        <button id="'.$all_brand->id .'" onclick="deletebrand(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deletebrand"><i class="far fa-trash-alt"></i> </button>';
            })
            ->make(true);
    }


    public function brand_save(Request $request)
    {
        $brand = new brand();
        $brand->brand_name = $request->brand_name;
        $brand->save();
        return back()->with('success','Brand Successfully Deleted');

    }

    public function brand_single(Request $request)
    {
        $single_brand = brand::where('id',$request->id)->first();
        return $single_brand;
    }

    public function brand_update(Request $request)
    {
        $brand_update = brand::where('id',$request->brand_edit)->first();
        $brand_update->brand_name = $request->brand_name;
        $brand_update->save();
        return back()->with('success','Brand Successfully Updated');
    }

    public function brand_delete(Request $request)
    {
        $delete_brand = brand::where('id',$request->brand_delete)->first();
        $delete_brand->delete();
        return back()->with('success','Brand Successfully Deleted');
    }


    public function size()
    {
        return view('admin.masterdata.size');
    }

    public function size_get()
    {
        $all_size = size::latest();
        return DataTables::of($all_size)
            ->addColumn('action',function ($all_size){
                return ' <button id="'.$all_size->id .'" onclick="editsize(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#editsize"><i class="fas fa-edit"></i> </button>
                        <button id="'.$all_size->id .'" onclick="deletesize(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deletesize"><i class="far fa-trash-alt"></i> </button>';
            })
            ->make(true);
    }



    public function size_save(Request $request)
    {
        $new_size = new size();
        $new_size->size_name = $request->size_name;
        $new_size->save();
        return back()->with('success','Size Successfully Deleted');

    }

    public function size_single(Request $request)
    {
        $single_size = size::where('id',$request->id)->first();
        return $single_size;
    }

    public function size_update(Request $request)
    {
        $size_update = size::where('id',$request->size_edit)->first();
        $size_update->size_name = $request->size_name;
        $size_update->save();
        return back()->with('success','Size Successfully Updated');
    }

    public function size_delete(Request $request)
    {
        $size_delete = size::where('id',$request->size_delete)->first();
        $size_delete->delete();
        return back()->with('success','Size Successfully Deleted');
    }

    public function color()
    {
        return view('admin.masterdata.color');
    }


    public function color_get()
    {
        $all_color = color::latest();
        return DataTables::of($all_color)
            ->addColumn('action',function ($all_color){
                return ' <button id="'.$all_color->id .'" onclick="editcolor(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#editcolor"><i class="fas fa-edit"></i> </button>
                        <button id="'.$all_color->id .'" onclick="deletecolor(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deletecolor"><i class="far fa-trash-alt"></i> </button>';
            })
            ->make(true);
    }


    public function color_save(Request $request)
    {
        $new_color = new color();
        $new_color->color_name = $request->color_name;
        $new_color->save();
        return back()->with('success','Color Successfully Created');
    }

    public function color_single(Request $request)
    {
        $single_color = color::where('id',$request->id)->first();
        return $single_color;
    }


    public function color_update(Request $request)
    {
        $update_color = color::where('id',$request->color_edit)->first();
        $update_color->color_name = $request->color_name;
        $update_color->save();
        return back()->with('success','Color Successfully Updated');
    }

    public function color_delete(Request $request)
    {
        $delete_color = color::where('id',$request->color_delete)->first();
        $delete_color->delete();
        return back()->with('success','Color Successfully Deleted');
    }
}
