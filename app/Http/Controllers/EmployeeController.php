<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use DB;
class EmployeeController extends Controller
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

    public function deleteEmployee($id){

        $employee=Employee::findorfail($id);
        $photo=$employee->photo;
        unlink($photo);
        $ss=$employee->delete();
        if($ss){
            $notification = array(
                'message' => ' Deleted successfully!',
                'alert-type' => 'error'
            );
             return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Error! Try Again!',
                'alert-type' => 'error'
            );
             return Redirect()->back()->with($notification);
        }
    }

    public function viewEmployee($id){

    }

    public function editEmployee($id){
        $edit=DB::table('employees')->where('id',$id)->first();

        return view('edit_employee',compact('edit'));
    }

    public function updateEmployee(Request $request,$id){
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'experience' => 'required',
            'nid' => 'required',
            'salary' => 'required',
            'vacation' => 'required',
            'city' => 'required',
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
                $img=DB::table('employees')->where('id',$id)->first();
                $image_path=$img->photo;
                unlink($image_path);

                $post=DB::table('employees')->where('id',$id)->update($data);
                if($post){
                    $notification = array(
                        'message' => 'Update successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('all.employee')->with($notification);
                }else{
                    $notification = array(
                        'message' => 'Update failed!Try again',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }
            }
        }else{

            $post=DB::table('employees')->where('id',$id)->update($data);
                if($post){
                    $notification = array(
                        'message' => 'Update successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('all.employee')->with($notification);
                }else{
                    $notification = array(
                        'message' => 'Update failed!Try again',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }

        }

    }
}
