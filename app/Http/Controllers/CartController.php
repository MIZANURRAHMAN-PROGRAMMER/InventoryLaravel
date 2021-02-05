<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
       $data=array();
       $data['id']=$request->id;
       $data['name']=$request->name;
       $data['qty']=$request->qty;
       $data['price']=$request->price;
      $add=Cart::add($data);
      if ($add) {
        $notification = array(
            'message' => 'added cart!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'added failed!',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function CardUpdate(Request $request,$rowId){

        $qty=$request->qty;
       $update= Cart::update($rowId,$qty);
       if ($update) {
        $notification = array(
            'message' => 'added cart!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'added failed!',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function CardDelete($rowId){
        $remove=Cart::remove($rowId);
        if($remove){
            $notification = array(
                'message' => 'delete cart!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
            }else{
                $notification = array(
                    'message' => 'delete failed!',
                    'alert-type' => 'warning'
                );
                return redirect()->back()->with($notification);
            }
    }

    public function createInvoice(Request $request){

        $validatedData = $request->validate([
            'cus_id' => 'required',
        ],
        [
            'cus_id.required' => 'please..select customer'

        ]);

        $cus_id=$request->cus_id;
        $customer=DB::table('customers')->where('id',$cus_id)->first();

        $contents=Cart::content();

        return view('Pos.invoice',compact('customer','contents'));

        // echo "<pre>";
        // print_r($contents);
        // print_r($customer);


    }

    public function finalInvoice(Request $request){

        $data=array();
        $data['cus_id']=$request->cus_id;
        $data['order_date']=$request->order_date;
        $data['order_status']=$request->order_status;
        $data['total_products']=$request->total_pro;
        $data['sub_total']=$request->sub_total;
        $data['vat']=$request->card_tax;
        $data['total']=$request->totalAmount;
        $data['payment_status']=$request->payment_status;
        $data['pay']=$request->paid_amount;
        $data['due']=$request->totalAmount-$request->paid_amount;
        // $data['']=$request->
        // return redirect()->back();

        $order_id=DB::table('orders')->insertGetId($data);
        $contents=Cart::content();


        $odata=array();

        foreach($contents as $content){
            $odata['order_id']= $order_id;
            $odata['product_id']= $content->id;
            $odata['quantity']= $content->qty;
            $odata['unitprice']= $content->price;
            $odata['total']= $content->total;

            $insert=DB::table('orderdetails')->insert($odata);

        }

        if ($insert) {
            $notification = array(
                'message' => 'Successfully Invoice created.Please deleiverd the product and accept status!',
                'alert-type' => 'success'
            );
            Cart::destroy();
            return Redirect()->route('home')->with($notification);
            }else{
                $notification = array(
                    'message' => ' failed!',
                    'alert-type' => 'warning'
                );
                return redirect()->back()->with($notification);
            }

        echo "<pre>";
        print_r($data);


    }
}
