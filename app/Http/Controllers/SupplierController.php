<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SupplierController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addSupplier(){
        return view('supplier.add_supplier');
    }

    public function allSupplier(){

        $supplier=DB::table('suppliers')->get();
        return view('supplier.all_supplier')->with("supplier",$supplier);
    }

    public function insetSupplier(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'shopename' => 'required',
            'account_number' => 'required',
            'account_name' => 'required',
            'bank_name' => 'required',
            'branch_name' => 'required',
            'city' => 'required',
            'type' => 'required',
            'photo' => 'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['type'] =$request->type;
        $data['shop']=$request->shopename;
        $data['account_number']=$request->account_number;
        $data['account_name']=$request->account_name;
        $data['bank_name']=$request->bank_name;
        $data['city']=$request->city;
        $data['bank_branch']=$request->branch_name;
        $image=$request->photo;
        if ($image) {
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_ful_name=$image_name.'.'.$ext;
            $upload_path='public/supplier/';
            $image_url=$upload_path.$image_ful_name;

            $success=$image->move($upload_path, $image_ful_name);
            if ($success) {
                $data['photo']=$image_url;
                $post=DB::table('suppliers')->insert($data);
                if ($post) {
                    $notification = array(
                        'message' => 'supplier added successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                } else {
                    $notification = array(
                        'message' => 'Added failed!Try again',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }
            }
            else {
                $notification = array(
                    'message' => 'Added failed!Try again',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    public function updateSupplier($id){
        $edit=DB::table('suppliers')->where('id',$id)->first();
        return view('supplier.edit_supplier')->with("edit",$edit);
    }

    public function editSupplier(Request $request,$id){
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'shopename' => 'required',
            'account_number' => 'required',
            'account_name' => 'required',
            'bank_name' => 'required',
            'branch_name' => 'required',
            'city' => 'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['shop']=$request->shopename;
        $data['account_number']=$request->account_number;
        $data['account_name']=$request->account_name;
        $data['bank_name']=$request->bank_name;
        $data['city']=$request->city;
        $data['type']=$request->type;
        $data['bank_branch']=$request->branch_name;
        $image=$request->photo;
        if ($image) {
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_ful_name=$image_name.'.'.$ext;
            $upload_path='public/supplier/';
            $image_url=$upload_path.$image_ful_name;

            $success=$image->move($upload_path, $image_ful_name);
            if ($success) {
                $data['photo']=$image_url;
                $img=DB::table('suppliers')->where('id',$id)->first();
                $del_img=$img->photo;
                unlink($del_img);
                $post=DB::table('suppliers')->where('id',$id)->update($data);
                if ($post) {
                    $notification = array(
                        'message' => 'supplier update successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('all.supplier')->with($notification);

                } else {
                    $notification = array(
                        'message' => 'failed!Try again',
                        'alert-type' => 'error'
                    );
                return redirect()->back()->with($notification);

                }
            }
            else {
                $notification = array(
                    'message' => 'failed!Try again',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
        else{
            $post=DB::table('suppliers')->where('id',$id)->update($data);
                if ($post) {
                    $notification = array(
                        'message' => 'supplier update successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('all.supplier')->with($notification);
                } else {
                    $notification = array(
                        'message' => 'update failed!Try again',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }


        }

    }

}
