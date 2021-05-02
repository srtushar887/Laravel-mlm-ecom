<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\user_shipping_address;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class UserCheckoutController extends Controller
{

    public function add_cart(Request $request)
    {
        $product = product::where('id',$request->product)->first();

        $data['qty'] = $request->qty;
        $data['id'] = $product->id;
        $data['name'] = $product->product_name;
        $data['price'] = $product->product_sell_price;
        $data['weight'] = 550;
        $data['options']['image'] = $product->product_main_image;
        $data['options']['size'] = $request->color;
        $data['options']['color'] = $request->size;

        Cart::add($data);
        Cart::tax(0);
        return back()->with('success','Product Cart Successfuly Added');
    }

    public function checkout()
    {

        return view('user.checkOut');
    }
}
