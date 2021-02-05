<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class OrderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pendingOrder(){
        $pending=DB::table('orders')->where('order_status','pending')
        ->join('customers','orders.cus_id','customers.id')
        ->select('customers.name','orders.*')->get();
        // echo "<pre>";
        // print_r($pending);
        return view("order.pending_order",compact("pending"));
    }

    public function DonePos($id){

        $data=array();
        $data['order_status']='done';
        $up=DB::table('orders')->where('id',$id)
            ->update($data);
            if($up){
                $notification = array(
                    'message' => 'Ordered Completed !',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }else{
                $notification = array(
                    'message' => ' failed!',
                    'alert-type' => 'warning'
                );
                return redirect()->back()->with($notification);
            }
    }
}
