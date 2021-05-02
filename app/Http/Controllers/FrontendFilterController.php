<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class FrontendFilterController extends Controller
{
    public function all_product_filter(Request $request)
    {
        $category = $request->catagory;
        $sub_category = $request->sub_catagory;
        $sub_sub_category = $request->sub_sub_catagory;

        $query="SELECT * FROM products WHERE product_status = 1  ";

        if (empty($category) && empty($sub_category) && empty($sub_sub_category) && empty($brand) && empty($size) && empty($color)){
            $query_exe = DB::select($query);
        }


        if (isset($category)){
            $cat_filter = implode("','", $category);
            $query .= "AND product_category_id IN('".$cat_filter."')   ";
            $query_exe = DB::select($query);
        }

        if (isset($sub_category)){
            $sub_cat_filter = implode("','", $sub_category);
            $query .= "AND product_sub_category_id IN('".$sub_cat_filter."')   ";
            $query_exe = DB::select($query);
        }

        if (isset($sub_sub_category)){
            $sub_sub_cat_filter = implode("','", $sub_sub_category);
            $query .= "AND product_sub_sub_category_id IN('".$sub_sub_cat_filter."')   ";
            $query_exe = DB::select($query);
        }

        if (isset($brand)){
            $brand_filter = implode("','", $brand);
            $query .= "AND product_brand_id IN('".$brand_filter."')   ";
            $query_exe = DB::select($query);
        }





        $products = $this->arrayPaginator($query_exe, $request);
        return response()->json([
            'notices' => $products,
            'view' => View::make('frontend.include.productsInclude', compact('products'))->render(),
            'pagination' => (string)$products->links()
        ]);

    }



    public function all_product_filter_get(Request $request)
    {
        $category = $request->catagory;
        $sub_category = $request->sub_catagory;
        $sub_sub_category = $request->sub_sub_catagory;

        $query="SELECT * FROM products WHERE product_status = 1  ";

        if (empty($category) && empty($sub_category) && empty($sub_sub_category) && empty($brand) && empty($size) && empty($color)){
            $query_exe = DB::select($query);
        }


        if (isset($category)){
            $cat_filter = implode("','", $category);
            $query .= "AND product_category_id IN('".$cat_filter."')   ";
            $query_exe = DB::select($query);
        }

        if (isset($sub_category)){
            $sub_cat_filter = implode("','", $sub_category);
            $query .= "AND product_sub_category_id IN('".$sub_cat_filter."')   ";
            $query_exe = DB::select($query);
        }

        if (isset($sub_sub_category)){
            $sub_sub_cat_filter = implode("','", $sub_sub_category);
            $query .= "AND product_sub_sub_category_id IN('".$sub_sub_cat_filter."')   ";
            $query_exe = DB::select($query);
        }

        if (isset($brand)){
            $brand_filter = implode("','", $brand);
            $query .= "AND product_brand_id IN('".$brand_filter."')   ";
            $query_exe = DB::select($query);
        }




        $products = $this->arrayPaginator($query_exe, $request);
        return response()->json([
            'notices' => $products,
            'view' => View::make('frontend.include.productsInclude', compact('products'))->render(),
            'pagination' => (string)$products->links()
        ]);
    }




    public function arrayPaginator($array, $request)
    {
        $page = $request->input('page', 1);
        $perPage = 21;
        $offset = ($page * $perPage) - $perPage;
        return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
            ['path' => $request->url(), 'query' => $request->query()]);

    }
}
