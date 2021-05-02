<?php

namespace App\Http\Controllers;

use App\Models\general_setting;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CustomLoginController extends Controller
{
    public function custom_register_save(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'nid_number' => 'required',
            'nid_frond_image' => 'required',
            'nid_back_image' => 'required',
            'password' => 'required|min:8'
        ],[
            'name.required' => 'Please Enter Your Full Name',
            'email.required' => 'Please Enter Your Email Address',
            'phone_number.required' => 'Please Enter Your Phone Number',
            'password.required' => 'Please Enter Your Name',
            'nid_number.required' => 'Please Enter Your NID Number',
            'nid_frond_image.required' => 'Please Enter Your NID Front Image',
            'nid_back_image.required' => 'Please Enter Your NID Back Image',
        ]);



        $exists_user = User::where('email',$request->email)->first();
        $exists_nid = User::where('nid_number',$request->nid_number)->first();
        $exists_phone = User::where('phone_number',$request->phone_number)->first();
        if ($request->password != $request->Confirm_password){
            return back()->with('alert','Password not match');
        }elseif ($exists_user){
            return back()->with('alert','Email already exists');
        }elseif ($exists_nid){
            return back()->with('alert','NID Number already exists');
        }elseif ($exists_phone){
            return back()->with('alert','Phone Number already exists');
        }else{
            $new_user = new User();


            if($request->hasFile('nid_frond_image')){
                $image = $request->file('nid_frond_image');
                $imageName = time().uniqid().'.png';
                $directory = 'assets/admin/images/logo/';
                $imgUrl  = $directory.$imageName;
                Image::make($image)->save($imgUrl);
                $new_user->nid_frond_image = $imgUrl;
            }


            if($request->hasFile('nid_back_image')){
                $image = $request->file('nid_back_image');
                $imageName = time().uniqid().'.png';
                $directory = 'assets/admin/images/usernid/';
                $imgUrl  = $directory.$imageName;
                Image::make($image)->save($imgUrl);
                $new_user->nid_back_image = $imgUrl;
            }

            $new_user->current_balance = 0.00;
            $new_user->income_balance = 0.00;
            $new_user->shopping_balance = 0.00;
            $new_user->name = $request->name;
            $new_user->email = $request->email;
            $new_user->phone_number = $request->phone_number;
            $new_user->nid_number = $request->nid_number;
            $new_user->password = Hash::make($request->password);
            $new_user->is_account_veify = 0;
            $new_user->account_type = 0;
            $new_user->admin_approved = 0;
            $new_user->ver_code = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
            $new_user->save();

            $user_update = User::where('id',$new_user->id)->first();
            $user_update->my_ref_id = Str::random(5).rand(0,9).rand(0,9).$new_user->id.rand(000,999).Str::random(5).rand(0000,9999);
            $user_update->save();

          

//            return redirect(route('login'))->with('success',"We have send you a OTP to your phone number. Please verify your OTP ");
            return redirect(route('verify.otp'))->with('success',"We have send you a OTP to your phone number. Please verify your OTP ");
        }



    }



    public function user_referral_register($id)
    {
        $ref_id = $id;
        return view('auth.userReferralRegister',compact('ref_id'));
    }


    public function user_referral_register_save(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'nid_number' => 'required',
            'nid_frond_image' => 'required',
            'nid_back_image' => 'required',
            'password' => 'required|min:8'
        ],[
            'name.required' => 'Please Enter Your Full Name',
            'email.required' => 'Please Enter Your Email Address',
            'phone_number.required' => 'Please Enter Your Phone Number',
            'password.required' => 'Please Enter Your Name',
            'nid_number.required' => 'Please Enter Your NID Number',
            'nid_frond_image.required' => 'Please Enter Your NID Front Image',
            'nid_back_image.required' => 'Please Enter Your NID Back Image',
        ]);



        $exists_user = User::where('email',$request->email)->first();
        $exists_nid = User::where('nid_number',$request->nid_number)->first();
        $exists_phone = User::where('phone_number',$request->phone_number)->first();
        if ($request->password != $request->Confirm_password){
            return back()->with('alert','Password not match');
        }elseif ($exists_user){
            return back()->with('alert','Email already exists');
        }elseif ($exists_nid){
            return back()->with('alert','NID Number already exists');
        }elseif ($exists_phone){
            return back()->with('alert','Phone Number already exists');
        }else {
            $new_user = new User();


            if ($request->hasFile('nid_frond_image')) {
                $image = $request->file('nid_frond_image');
                $imageName = time() . uniqid() . '.png';
                $directory = 'assets/admin/images/logo/';
                $imgUrl = $directory . $imageName;
                Image::make($image)->save($imgUrl);
                $new_user->nid_frond_image = $imgUrl;
            }


            if ($request->hasFile('nid_back_image')) {
                $image = $request->file('nid_back_image');
                $imageName = time() . uniqid() . '.png';
                $directory = 'assets/admin/images/usernid/';
                $imgUrl = $directory . $imageName;
                Image::make($image)->save($imgUrl);
                $new_user->nid_back_image = $imgUrl;
            }

            $new_user->have_ref_id = $request->have_ref_id;
            $new_user->current_balance = 0.00;
            $new_user->income_balance = 0.00;
            $new_user->shopping_balance = 0.00;
            $new_user->name = $request->name;
            $new_user->email = $request->email;
            $new_user->phone_number = $request->phone_number;
            $new_user->nid_number = $request->nid_number;
            $new_user->password = Hash::make($request->password);
            $new_user->is_account_veify = 0;
            $new_user->account_type = 1;
            $new_user->admin_approved = 0;
            $new_user->ver_code = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
            $new_user->save();

            $user_update = User::where('id', $new_user->id)->first();
            $user_update->my_ref_id = Str::random(5) . rand(0, 9) . rand(0, 9) . $new_user->id . rand(000, 999) . Str::random(5) . rand(0000, 9999);
            $user_update->save();
        }



//            return redirect(route('login'))->with('success',"We have send you a OTP to your phone number. Please verify your OTP ");
        return redirect(route('verify.otp'))->with('success',"We have send you a OTP to your phone number. Please verify your OTP ");

    }






    public function custom_login_submit(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|min:8'
        ]);
        if(Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            return redirect()->intended(route('dashboard'));
        }else{
            return redirect()->back()->with('user_login_error','This credentials does not match our record');
        }
    }



    public function verify_otp()
    {
        return view('auth.verifyOtp');
    }


    public function verify_otp_submit(Request $request)
    {
        $user = User::where('ver_code',$request->code)->first();
        if (!$user) {
            return back()->with('alert','Code not match');
        }else{
            $user->ver_code = null;
            $user->is_account_veify = 1;
            $user->save();

            return redirect(route('login'))->with('success','Account successfully verified. Please login');

        }
    }



    public function reset_password()
    {
        return view('auth.userResetPassword');
    }


    public function reset_password_code_submit(Request $request)
    {
        $user = User::where('phone_number',$request->phone_number)->first();
        if (!$user) {
            return back()->with('alert','Sorry! Phone number not found');
        }else{
            $user->ver_code = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
            $user->save();

            return redirect(route('user.reset.changePassword',$user->id))->with('success',"We have send you a OTP to your phone number. Please verify your OTP ");;

        }
    }


    public function reset_password_change($id)
    {
        $user_id = $id;
        return view('auth.resetPasswordChange',compact('user_id'));
    }


    public function reset_password_change_submit(Request $request)
    {
        $this->validate($request,[
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|min:8',
        ],[
            'new_password.required' => 'Please Enter Your New Password',
            'confirm_password.required' => 'Please Enter Your Confirm Password',
        ]);


        if ($request->new_password != $request->confirm_password) {

        }


    }







}
