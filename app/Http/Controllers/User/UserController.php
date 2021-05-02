<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\user_account_activation;
use App\Models\user_order;
use App\Models\user_shipping_address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $total_orders = user_order::where('id',Auth::user()->id)->where('status',1)->count();
        $approved_orders = user_order::where('id',Auth::user()->id)->where('status',2)->count();
        $delivered_orders = user_order::where('id',Auth::user()->id)->where('status',2)->count();
        $rejected_orders = user_order::where('id',Auth::user()->id)->where('status',2)->count();
        $users_orders = user_order::where('user_id',Auth::user()->id)->orderBy('id','desc')->limit(10)->get();

        return view('user.index',compact('total_orders','approved_orders','delivered_orders','rejected_orders','users_orders'));
    }

    public function shipping_address()
    {
        $address = user_shipping_address::where('user_id',Auth::user()->id)->paginate(10);
        return view('user.pages.shippingAddress',compact('address'));
    }

    public function shipping_address_save(Request $request)
    {
        $new_address = new user_shipping_address();
        $new_address->user_id = Auth::user()->id;
        $new_address->country = $request->country;
        $new_address->city = $request->city;
        $new_address->address = $request->address;
        $new_address->state = $request->state;
        $new_address->postal_code = $request->postal_code;
        $new_address->is_default = $request->is_default;
        $new_address->save();
        return back()->with('success','Shipping Address Successfully Created');

    }

    public function shipping_address_update(Request $request)
    {
        $update_address = user_shipping_address::where('id',$request->ship_edit)->first();
        $update_address->country = $request->country;
        $update_address->city = $request->city;
        $update_address->address = $request->address;
        $update_address->state = $request->state;
        $update_address->postal_code = $request->postal_code;
        $update_address->is_default = $request->is_default;
        $update_address->save();
        return back()->with('success','Shipping Address Successfully Updated');
    }

    public function shipping_address_delete(Request $request)
    {
        $delete_address = user_shipping_address::where('id',$request->shi_delete)->first();
        $delete_address->delete();
        return back()->with('success','Shipping Address Successfully Deleted');
    }


    public function change_password()
    {
        return view('user.pages.changePassword');
    }

    public function change_password_update(Request $request){
        $this->validate($request,[
           'npass'=>'required|min:8',
           'cpass'=>'required|min:8',
        ],[
            'npass.required'=>'Please Enter New Password',
            'cpass.required'=>'Please Enter Confirm Password',
        ]);


        if ($request->npass != $request->cpass){
            return back()->with('alert','Password Not match');
        }else{
            $user = User::where('id',Auth::user()->id)->first();
            $user->password = Hash::make($request->npass);
            $user->save();

            Auth::guard('web')->logout();
            Session::flush();
            \auth()->guard('web')->login($user);
            return redirect(route('user.change.password'))->with('success','Password Successfully Changed');
        }


    }



    public function account_activation_submit(Request $request)
    {
        $new_activation = new user_account_activation();
        $new_activation->user_id = Auth::user()->id;
        $new_activation->amount = $request->amount;
        $new_activation->sender_address = $request->sender_address;
        $new_activation->trx_id = $request->trx_id;
        $new_activation->status = 1;
        $new_activation->save();


        $user = User::where('id',Auth::user()->id)->first();
        $user->admin_approved = 1;
        $user->save();



        return back()->with('success','Your request has been successfully submited');

    }






}
