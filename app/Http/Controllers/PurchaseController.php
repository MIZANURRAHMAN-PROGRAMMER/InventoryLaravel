<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addPurchase(){
        return view('purchase.add_purchase');
    }

    public function allPurchase(){

        $purchase=DB::table('purchases')
            ->join('products','purchases.pro_id','products.id')
            ->join('suppliers','purchases.sup_id','suppliers.id')
            ->select('purchases.*','products.product_name','products.product_details','products.product_image','suppliers.name')
            ->orderBy('id','DESC')
            ->get();


        return view('purchase.all_purchase',compact("purchase"));
    }

    public function insertPurchase(Request $request){

        $validatedData = $request->validate([
            'pro_id' => 'required',
            'sup_id' => 'required',
            'pro_quant' => 'required',
        ]);
        $data=array();
        $data['pro_id']=$request->pro_id;
        $data['pro_quant']=$request->pro_quant;
        $data['sup_id']=$request->sup_id;
        $data['product_garage']=$request->product_garage;
        $data['product_route']=$request->product_route;
        $data['buy_date']=$request->buy_date;
        $data['expire_date']=$request->expire_date;
        $data['buying_price']=$request->buying_price;
        $data['selling_price']=$request->selling_price;

         $post=DB::table('purchases')->insert($data);
                if($post){
                    $notification = array(
                        'message' => ' added successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                }else{
                    $notification = array(
                        'message' => 'Added failed!Try again',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }


    }

    public function updatePurchas($id){
        $purchase=DB::table('purchases')->where('id',$id)->first();
       return view('purchase.edit_purchase')->with("purchase",$purchase);

    }

    public function editPurchase(Request $request,$id){
        $validatedData = $request->validate([
            'pro_id' => 'required',
            'sup_id' => 'required',
            'pro_quant' => 'required',
        ]);
        $data=array();
        $data['pro_id']=$request->pro_id;
        $data['pro_quant']=$request->pro_quant;
        $data['sup_id']=$request->sup_id;
        $data['product_garage']=$request->product_garage;
        $data['product_route']=$request->product_route;
        $data['buy_date']=$request->buy_date;
        $data['expire_date']=$request->expire_date;
        $data['buying_price']=$request->buying_price;
        $data['selling_price']=$request->selling_price;

         $post=DB::table('purchases')->where('id',$id)->update($data);
                if($post){
                    $notification = array(
                        'message' => ' update successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('all.purchase')->with($notification);
                }else{
                    $notification = array(
                        'message' => 'update failed!Try again',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }

    }

    public function deleteExpense($id){
        $post=DB::table('expenses')->where('id',$id)->delete();
                if($post){
                    $notification = array(
                        'message' => ' delete successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('all.purchase')->with($notification);
                }else{
                    $notification = array(
                        'message' => 'delete failed!Try again',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }
    }


}
