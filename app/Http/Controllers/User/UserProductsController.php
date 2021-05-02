<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\product_review;
use App\Models\user_shipping_address;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class UserProductsController extends Controller
{



    public function show_products()
    {
        $products = product::where('product_status',1)->orderBy('id','desc')->paginate(12);
        return view('user.products.showProducts',compact('products'));
    }


    public function product_info($id)
    {
        $product = product::where('id',$id)->first();
        $product_reviews = product_review::where('product_id',$id)->paginate(5);
        return view('user.products.productInfo',compact('product','product_reviews'));
    }


    public function product_review_save(Request $request)
    {
        $new_review = new product_review();
        $new_review->product_id = $request->product_review_id;
        $new_review->star = $request->star;
        $new_review->reviewr_name = Auth::user()->name;
        $new_review->desc = $request->desc;
        $new_review->save();

        return back()->with('success','Product Review Successfully Saved');

    }



    public function product_cart()
    {
        return view('user.products.productCart');
    }



    public function product_cart_single_save(Request $request)
    {
        $product = product::where('id',$request->product_card_id)->first();

        $data['qty'] = 1;
        $data['id'] = $product->id;
        $data['name'] = $product->product_name;
        $data['pslug'] = $product->product_slug;
        $data['price'] = $product->product_sell_price;
        $data['weight'] = 550;
        $data['options']['image'] = $product->product_main_image;
        $data['options']['size'] = $request->product_color;
        $data['options']['color'] = $request->product_size;

        Cart::add($data);
        Cart::tax(0);

        return back()->with('success','Product add to card successfully');


    }



    public function product_checkout()
    {
        $user_ship_address = user_shipping_address::where('is_default',1)->first();
        return view('user.products.productCheckout',compact('user_ship_address'));
    }



}
