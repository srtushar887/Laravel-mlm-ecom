<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\size;
use App\Models\user_order;
use App\Models\user_order_details;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminOrderController extends Controller
{
    public function new_order()
    {
        return view('admin.order.newOrder');
    }

    public function new_order_get()
    {
        $orders = user_order::with('user')
            ->where('status',1)
            ->latest();
        return DataTables::of($orders)
            ->addColumn('action',function ($orders){
                return ' <a href="'.route('admin.order.details',$orders->id).'"> <button class="btn btn-success btn-info btn-sm"><i class="fas fa-eye"></i> </button></a>
                        <button id="'.$orders->id .'" onclick="deletesize(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deletesize"><i class="far fa-trash-alt"></i> </button>';
            })
            ->editColumn('created_at',function ($orders){
                return Carbon::parse($orders->created_at)->format('Y-m-d');
            })
            ->make(true);
    }


    public function approved_details()
    {
        return view('admin.order.approvedOrder');
    }

    public function approved_details_get()
    {
        $orders = user_order::with('user')
            ->where('status',2)
            ->latest();
        return DataTables::of($orders)
            ->addColumn('action',function ($orders){
                return ' <a href="'.route('admin.order.details',$orders->id).'"> <button class="btn btn-success btn-info btn-sm"><i class="fas fa-eye"></i> </button></a>
                        <button id="'.$orders->id .'" onclick="deletesize(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deletesize"><i class="far fa-trash-alt"></i> </button>';
            })
            ->editColumn('created_at',function ($orders){
                return Carbon::parse($orders->created_at)->format('Y-m-d');
            })
            ->make(true);
    }


    public function rejected_details()
    {
        return view('admin.order.rejectedOrder');
    }


    public function rejected_details_get()
    {
        $orders = user_order::with('user')
            ->where('status',3)
            ->latest();
        return DataTables::of($orders)
            ->addColumn('action',function ($orders){
                return ' <a href="'.route('admin.order.details',$orders->id).'"> <button class="btn btn-success btn-info btn-sm"><i class="fas fa-eye"></i> </button></a>
                        <button id="'.$orders->id .'" onclick="deletesize(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deletesize"><i class="far fa-trash-alt"></i> </button>';
            })
            ->editColumn('created_at',function ($orders){
                return Carbon::parse($orders->created_at)->format('Y-m-d');
            })
            ->make(true);
    }

    public function delivered_details()
    {
        return view('admin.order.deliveredOrder');
    }

    public function delivered_details_get()
    {
        $orders = user_order::with('user')
            ->where('status',4)
            ->latest();
        return DataTables::of($orders)
            ->addColumn('action',function ($orders){
                return ' <a href="'.route('admin.order.details',$orders->id).'"> <button class="btn btn-success btn-info btn-sm"><i class="fas fa-eye"></i> </button></a>
                        <button id="'.$orders->id .'" onclick="deletesize(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deletesize"><i class="far fa-trash-alt"></i> </button>';
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
        return view('admin.order.orderDetails',compact('order','order_details'));
    }

    public function order_update(Request $request)
    {
        $status = $request->status;
        if ($status == 2){
            $order = user_order::where('id',$request->order_update_id)->first();
            $order->status = $status;
            $order->save();

            return back()->with('success','Order Successfully Approved');

        }elseif ($status == 3){
            $order = user_order::where('id',$request->order_update_id)->first();
            $order->status = $status;
            $order->save();

            return back()->with('success','Order Successfully Rejected');
        }elseif ($status == 4){
            $order = user_order::where('id',$request->order_update_id)->first();
            $order->status = $status;
            $order->save();

            return back()->with('success','Order Successfully Delivered');
        }else{
            return back()->with('alert','Please select order status');
        }
    }



}
