<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PosController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function posView(){
        $purchase=DB::table('purchases')
            ->join('products','purchases.pro_id','products.id')
            ->join('catagories','products.cat_id','catagories.id')
            ->select('purchases.*','products.id','products.product_name','products.product_image','products.product_code','catagories.catName')
            ->get();
        $customer=DB::table('customers')->get();
        $catagories=DB::table('catagories')->get();

            return view('Pos.pos',compact('purchase','customer','catagories'));
    }
}
