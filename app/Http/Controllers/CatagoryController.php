<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CatagoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function catagory(){

        $catagory=DB::table('catagories')->get();
        return view('product.catagory')->with("catagory",$catagory);
    }

    public function addCatagory(Request $request){
        // $validatedData = $request->validate([
        //     'catName' => 'required|unique:catagories|max:255',
        // ]);
        $data=array();
        $data['catName']=$request->catName;
        $insert=DB::table('catagories')->insert($data);
        if($insert){
            $notification = array(
                'message' => 'Catagory added successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Catagory failed!',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function deleteCatagory($id){
        $del=DB::table('catagories')->where('id',$id)->delete();
        if($del){
            $notification = array(
                'message' => 'Catagory delete successfully!',
                'alert-type' => 'warning'
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


}
