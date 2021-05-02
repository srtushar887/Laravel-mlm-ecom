<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\user_order;
use App\Models\user_order_details;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Stripe;
class UserOrderController extends Controller
{
    public function user_order_save(Request $request)
    {


        $total_am = $request->total_amount;
        $cc = $request->cardNumber;
        $exp = $request->cardExpiry;
        $cvc = $request->cardCVC;


        $exp = $pieces = explode("/", $_POST['cardExpiry']);
        $emo = trim($exp[0]);
        $eyr = trim($exp[1]);
        $cnts = round($total_am,2) * 100;
        Stripe\Stripe::setApiKey('sk_test_Rc3ItpcRMziLqT8XyLO0qesh00RYg0WFJi');
        $token = Stripe\Token::create(array(
            "card" => array(
                "number" => "$cc",
                "exp_month" => $emo,
                "exp_year" => $eyr,
                "cvc" => "$cvc"
            )
        ));

        Stripe\Charge::create ([
            'card' => $token['id'],
            'currency' => 'USD',
            'amount' => $cnts,
            'description' => 'item',
        ]);



        $user_order = new user_order();
        $user_order->user_id = Auth::user()->id;
        $user_order->order_id = time().Auth::user()->id.rand(11,99);
        $user_order->total_amount = $total_am;
        $user_order->status = 1;
        $user_order->save();

        $cards = Cart::content();
        foreach ($cards as $card) {
            $order_detais = new user_order_details();
            $order_detais->order_id = $user_order->id;
            $order_detais->product_id = $card->id;
            $order_detais->price = $card->price;
            $order_detais->qty = $card->qty;
            $order_detais->color_id = $card->options->color;
            $order_detais->size_id = $card->options->size;
            $order_detais->save();
        }


        return redirect(route('my.orders'))->with('success','Order Created');

    }


    public function my_orders()
    {
        return view('user.order.myOrders');
    }

    public function my_orders_get()
    {
        $orders = user_order::where('user_id',Auth::user()->id)
            ->latest();
        return DataTables::of($orders)
            ->addColumn('action',function ($orders){
                return ' <a href="'.route('user.order.details',$orders->id).'"> <button class="btn btn-success btn-info btn-sm"><i class="fas fa-eye"></i> </button></a>
                        <a href="'.route('user.order.details',$orders->id).'"> <button class="btn btn-success btn-info btn-sm"><i class="fas fa-eye"></i> </button></a>';
            })
            ->editColumn('created_at',function ($orders){
                return Carbon::parse($orders->created_at)->format('Y-m-d');
            })
            ->make(true);
    }

    public function order_details($id)
    {
        $order = user_order::where('id',$id)
            ->with('user')
            ->first();
        $order_details = user_order_details::where('order_id',$id)->get();
        return view('user.order.orderDetails',compact('order','order_details'));
    }



}
