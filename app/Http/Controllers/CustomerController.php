<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Customer;
class CustomerController extends Controller
{
    //
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addcustomer(){
        return view('customers.add_customer');
    }

    public function allcustomer(){
        $customer=DB::table('customers')->get();
        return view('customers.all_customer')->with("customer",$customer);
    }

    public function insertCustomer(Request $request){

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
            'photo' => 'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['shopename']=$request->shopename;
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
            $upload_path='public/customers/';
            $image_url=$upload_path.$image_ful_name;

            $success=$image->move($upload_path, $image_ful_name);
            if ($success) {
                $data['photo']=$image_url;
                $post=DB::table('customers')->insert($data);
                if ($post) {
                    $notification = array(
                        'message' => 'customer added successfully!',
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

    public function deleteCustomer($id){
        $del=Customer::findorfail($id);
       $photo=$del->photo;
       $delet=$del->delete();
       if($delet){
           unlink($photo);
        $notification = array(
            'message' => 'delete successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } else {
        $notification = array(
            'message' => 'delete failed!Try again',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);


       }
    }


    public function updateCustomer($id){
        $customer=Customer::findorfail($id);
        return view('customers.edit_customer')->with("edit",$customer);
    }

    public function editCustomer(Request $request,$id){
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
        $data['shopename']=$request->shopename;
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
            $upload_path='public/customers/';
            $image_url=$upload_path.$image_ful_name;

            $success=$image->move($upload_path, $image_ful_name);
            if ($success) {
                $data['photo']=$image_url;
                $img=DB::table('customers')->where('id',$id)->first();
                $del_img=$img->photo;
                unlink($del_img);
                $post=DB::table('customers')->where('id',$id)->update($data);
                if ($post) {
                    $notification = array(
                        'message' => 'customer update successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('all.customer')->with($notification);

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
        else{
            $post=DB::table('customers')->where('id',$id)->update($data);
                if ($post) {
                    $notification = array(
                        'message' => 'customer update successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('all.customer')->with($notification);
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
