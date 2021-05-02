<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\user_account_activation;
use App\Models\user_order;
use App\Models\user_order_details;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class AdminUserController extends Controller
{
    public function active_customer()
    {
        return view('admin.user.activeCustomer');
    }

    public function user_get()
    {
        $users = DB::table('users')->get();
        return DataTables::of($users)
            ->addColumn('action',function ($users){
                return ' <a href="'.route('admin.user.details',$users->id).'"> <button class="btn btn-success btn-info btn-sm"><i class="fas fa-eye"></i> </button></a>
                        <button id="'.$users->id .'" onclick="deleteuser(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deleteuser"><i class="far fa-trash-alt"></i> </button>
                        <button id="'.$users->id .'" onclick="addbalance(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#admoney"><i class="fas fa-money-check-alt"></i> </button>
                        ';
            })
            ->editColumn('created_at',function ($users){
                return Carbon::parse($users->created_at)->format('Y-m-d');
            })
            ->make(true);
    }


    public function create_user()
    {
        return view('admin.user.createUser');
    }

    public function create_user_save(Request $request)
    {


        $this->validate($request,[
           'name' => 'required',
           'email' => 'required',
           'phone_number' => 'required',
           'password' => 'required',
           'account_type' => 'required',
        ]);

        $new_user = new User();
        $new_user->name = $request->name;
        $new_user->email = $request->email;
        $new_user->phone_number = $request->phone_number;
        $new_user->password = Hash::make($request->password);
        $new_user->account_type = $request->account_type;
        $new_user->save();

        return back()->with('success','User Successfully Created');

    }




    public function user_details($id)
    {
        $user = User::where('id',$id)->first();
        return view('admin.user.userDetails',compact('user'));
    }


    public function user_details_update(Request $request)
    {
        $update_user = User::where('id',$request->user_edit)->first();
        $update_user->name = $request->name;
        $update_user->email = $request->email;
        $update_user->phone_number = $request->phone_number;
        $update_user->account_type = $request->account_type;
        $update_user->save();

        return back()->with('success','User Updated');

    }


    public function user_delete(Request $request)
    {
        $delete_user = User::where('id',$request->user_delete)->first();

        $user_orders = user_order::where('user_id',$delete_user->id)->get();

        foreach ($user_orders  as $userorder){
            user_order_details::where('order_id',$userorder->id)->delete();
            $userorder->delete();
        }

        $delete_user->delete();

        return back()->with('success','User Account Successfully Deleted');

    }

    public function user_add_balance(Request $request)
    {
        $user = User::where('id',$request->add_balance)->first();
        $user->current_balance = $user->current_balance + $request->amount;
        $user->save();
        return back()->with('success','Balance Successfully Added');
    }



    public function user_account_activation_list()
    {
        return view('admin.user.userAccountActivation');
    }

    public function user_account_activation_list_get(Request $request)
    {
        $users = DB::table('users')->where('admin_approved',0)->get();
        return DataTables::of($users)
            ->addColumn('action',function ($users){
                return ' <a href="'.route('admin.user.activation.details',$users->id).'"> <button class="btn btn-success btn-info btn-sm"><i class="fas fa-eye"></i> </button></a>';
            })
            ->editColumn('created_at',function ($users){
                return Carbon::parse($users->created_at)->format('Y-m-d');
            })
            ->make(true);
    }

    public function user_account_activation_details($id)
    {
        $user = User::where('id',$id)->first();
        return view('admin.user.userAccountActivationDetails',compact('user'));
    }

    public function user_account_activation_details_save(Request $request)
    {
        if ($request->status == 1) {
            $user= User::where('id',$request->edit_user)->first();
            $user->admin_approved = $request->status;
            $user->save();

            $created_user = User::where('id',$user->created_by_id)->first();
            if ($created_user) {
                $created_user->income_balance = $created_user->income_balance + 25;
                $created_user->save();
            }


            return back()->with('success','Account Apporved');

        }elseif ($request->status == 2){
            $user= User::where('id',$request->edit_user)->first();
            $user->admin_approved = $request->status;
            $user->save();

            return back()->with('success','Account Rejected');
        }else{
            return back()->with('alert','Please select account status');
        }
    }


    public function verify_account()
    {
        return view('admin.user.verifyUser');
    }


    public function verify_account_get(Request $request)
    {
        $users = user_account_activation::with('user')->get();
        return DataTables::of($users)
            ->addColumn('action',function ($users){
                return ' <button id="'.$users->id .'" onclick="verifyuser(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#verifyuser"><i class="fas fa-eye"></i> </button>';
            })
            ->make(true);
    }

    public function verify_account_submit(Request $request)
    {
        if ($request->status == 1) {
            $verify_user = user_account_activation::where('id',$request->veirify_user)->first();
            $verify_user->status = 2;
            $verify_user->save();

            $user = User::where('id',$verify_user->user_id)->first();
            $user->is_account_veify = 1;
            $user->save();

            return back()->with('success','Account Verified Successfull');


        }elseif ($request->status == 2){
            $verify_user = user_account_activation::where('id',$request->veirify_user)->first();
            $verify_user->status = 3;
            $verify_user->save();


            $user = User::where('id',$verify_user->user_id)->first();
            $user->is_account_veify = 0;
            $user->admin_approved = 3;
            $user->save();


            return back()->with('success','Account Verified Rejected');
        }else{
            return back()->with('alert','Please select status');
        }
    }








}
