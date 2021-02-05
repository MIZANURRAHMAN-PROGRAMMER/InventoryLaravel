<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class Employee extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //employee
    public function addemployee(){
        return view('add_employee');
    }

    public function insetEmployee(Request $request){


        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:employees|max:255',
            'phone' => 'required',
            'address' => 'required',
            'experience' => 'required',
            'nid' => 'required|unique:employees|max:255',
            'salary' => 'required',
            'vacation' => 'required',
            'city' => 'required',
            'photo' => 'required',
            'status' => 'required',

        ]);
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['experience']=$request->experience;
        $data['nid']=$request->nid;
        $data['salary'] =$request->salary;
        $data['vacation']=$request->vacation;
        $data['city']=$request->city;
        $data['status']=$request->status;
        $image=$request->photo;

        if($image){
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_ful_name=$image_name.'.'.$ext;
            $upload_path='public/post/';
            $image_url=$upload_path.$image_ful_name;

            $success=$image->move($upload_path, $image_ful_name);
            if($success){
                $data['photo']=$image_url;
                $post=DB::table('employees')->insert($data);
                if($post){
                    $notification = array(
                        'message' => 'employee added successfully!',
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
        }
    }

    public function allemployee(){
        $employee=DB::table('employees')->get();
        return view('all_employee')->with("employee",$employee);
    }


}
