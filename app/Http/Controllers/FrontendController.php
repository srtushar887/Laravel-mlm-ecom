<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\blog_comment;
use App\Models\brand;
use App\Models\category;
use App\Models\color;
use App\Models\home_slider;
use App\Models\product;
use App\Models\product_review;
use App\Models\size;
use App\Models\sub_category;
use App\Models\sub_sub_category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = category::all();
        $sliders = home_slider::all();
        return view('frontend.index',compact('categories','sliders'));
    }

    public function about_us()
    {
        return view('frontend.aboutUs');
    }

    public function blog()
    {
        $blogs = blog::orderBy('id','desc')->paginate(10);
        return view('frontend.blog',compact('blogs'));
    }

    public function blog_details($id)
    {
        $blog = blog::where('id',$id)->first();
        $comments = blog_comment::where('blog_id',$id)->orderBy('id','desc')->paginate(10);
        $comment_count = blog_comment::where('blog_id',$id)->count();
        return view('frontend.blogDetails',compact('blog','comments','comment_count'));
    }


    public function blog_comment_save(Request $request)
    {
        $new_comment = new blog_comment();
        $new_comment->blog_id = $request->blog_rev_id;
        $new_comment->name = $request->name;
        $new_comment->desc = $request->desc;
        $new_comment->save();

        return back()->with('success','Blog Comment Successfully Created');

    }






    public function all_product()
    {
        $categoris = category::all();
        $products = product::where('product_status',1)->orderBy('id','desc')->paginate(12);
        $products_count = product::where('product_status',1)->count();
        return view('frontend.allProduct',compact('categoris','products','products_count'));
    }


    public function product_details($slug,$id)
    {
        $product = product::where('id',$id)->first();
        $latest_products = product::where('product_category_id',$product->product_category_id)->where('id',$product->id)->inRandomOrder()
            ->limit(10)->get();
        $review_count = product_review::where('product_id',$id)->count();
        return view('frontend.productDetails',compact('product','latest_products','review_count'));
    }


    public function product_review_save(Request $request)
    {
        $new_review = new product_review();
        $new_review->product_id = $request->product_review_id;
        $new_review->star = $request->star;
        $new_review->reviewr_name = $request->reviewr_name;
        $new_review->desc = $request->desc;
        $new_review->save();

        return back()->with('success','Product Review Successfully Created');

    }


    public function category_product($cat_slug,$cat_id,$cat_type)
    {
        $type = $cat_type;

        if ($cat_type == 1)
        {
            $products = product::where('product_category_id',$cat_id)->paginate(12);
            $count_product = product::where('product_category_id',$cat_id)->count();
        }elseif ($cat_type == 2){
            $products = product::where('product_sub_category_id',$cat_id)->paginate(12);
            $count_product = product::where('product_sub_category_id',$cat_id)->count();
        }else{
            $products = product::where('product_sub_sub_category_id',$cat_id)->paginate(12);
            $count_product = product::where('product_sub_sub_category_id',$cat_id)->count();
        }

        return view('frontend.catProduct',compact('products','count_product'));
    }




    public function search_product(Request $request)
    {
        $search = $request->search;
        $products = product::where('product_name','LIKE','%'.$search.'%')
            ->where('product_status',1)
            ->paginate(12);
        $products->appends(['search' => $search]);
        $count_product = product::where('product_name','LIKE','%'.$search.'%')
            ->where('product_status',1)
            ->count();
        return view('frontend.searchProduct',compact('products','search','count_product'));
    }




    public function contact_us()
    {
        return view('frontend.contactUs');
    }


    public function addt_to_card(Request $request)
    {
        $product = product::where('id',$request->product)->first();

        $data['qty'] = $request->qty;
        $data['id'] = $product->id;
        $data['name'] = $product->product_name;
        $data['pslug'] = $product->product_slug;
        $data['price'] = $product->product_sell_price;
        $data['weight'] = 550;
        $data['options']['image'] = $product->product_main_image;
        $data['options']['size'] = $request->color;
        $data['options']['color'] = $request->size;

        Cart::add($data);
        Cart::tax(0);
        return 'success';

    }


    public function view_cart()
    {
        return view('frontend.viewCard');
    }


    public function update_shopping_cart(Request $request)
    {
        $cart_id = $request->cart_id;
        for($i=0;$i<count($cart_id);$i++){
            $qt = $request->qty[$i];
            $id = $request->cart_id[$i];
            Cart::update($id, $qt);
        }

        return back()->with('success','Cart Successfully Updated');


    }

    public function cart_item_remove($id)
    {
        Cart::remove($id);
        return back()->with('success','Cart Item Successfully Removed');
    }
}
