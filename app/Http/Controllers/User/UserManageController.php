<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserManageController extends Controller
{
    public function create_user()
    {
        if (Auth::user()->account_type == 0) {
            return view('user.manageuser.createUser');
        }else{
            return redirect(route('dashboard'));
        }

    }

    public function create_user_save(Request $request)
    {

        if (Auth::user()->is_account_veify == 1) {



            $exists_user = User::where('email',$request->email)->first();
            $exists_nid = User::where('nid_number',$request->nid_number)->first();
            $exists_phone = User::where('phone_number',$request->phone_number)->first();

            if ($exists_user) {
                return back()->with('alert','Email already exists');
            }elseif ($exists_nid){
                return back()->with('alert','NID Number already exists');
            }elseif ($exists_phone){
                return back()->with('alert','Phone Number already exists');
            }else{
                $user = new User();

                if($request->hasFile('nid_frond_image')){
                    $image = $request->file('nid_frond_image');
                    $imageName = $user->id.time().uniqid().'.png';
                    $directory = 'assets/admin/images/logo/';
                    $imgUrl  = $directory.$imageName;
                    Image::make($image)->save($imgUrl);
                    $user->nid_frond_image = $imgUrl;
                }


                if($request->hasFile('nid_back_image')){
                    $image = $request->file('nid_back_image');
                    $imageName = $user->id.time().uniqid().'.png';
                    $directory = 'assets/admin/images/usernid/';
                    $imgUrl  = $directory.$imageName;
                    Image::make($image)->save($imgUrl);
                    $user->nid_back_image = $imgUrl;
                }


                $user->name = $request->name;
                $user->email = $request->email;
                $user->phone_number = $request->phone_number;
                $user->nid_number = $request->nid_number;
                $user->password = Hash::make($request->password);
                $user->created_by_id = Auth::user()->id;
                $user->admin_approved = 0;
                $user->account_type = 1;
                $user->save();

                return back()->with('success','User Successfully Created');
            }

        }else{
            return back()->with('alert','Sorry! Your account is not verified');
        }


    }


    public function user_list()
    {
        if (Auth::user()->account_type == 0) {
            $users = User::where('have_ref_id', Auth::user()->my_ref_id)->orderBy('id', 'desc')->paginate(10);
            return view('user.manageuser.userList', compact('users'));
        }else{
            return redirect(route('dashboard'));
        }
    }


    public function user_send_money(Request $request)
    {

        if (Auth::user()->current_balance ==  0) {
            return back()->with('alert','Insufficient Balance');
        }elseif (Auth::user()->current_balance <  $request->amount){
            return back()->with('alert','Insufficient Balance');
        }else{
            $send_money = User::where('id',$request->user_id)->first();
            $send_money->shopping_balance = $send_money->shopping_balance + $request->amount;
            $send_money->is_account_veify = 1;
            $send_money->save();

            $current_user =  User::where('id',Auth::user()->id)->first();
            $current_user->current_balance = $current_user->current_balance - $request->amount;
            $current_user->income_balance = $current_user->income_balance + 25;
            $current_user->save();

            return back()->with('alert','Money Send Successfully');
        }
    }



}
