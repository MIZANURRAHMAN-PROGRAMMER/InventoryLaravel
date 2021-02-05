<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SalaryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addSalary(){
        $salary=DB::table('employees')
        ->leftJoin('advanced_salarys', 'employees.id', '=', 'advanced_salarys.emp_id')
        ->select('employees.*','advanced_salarys.month','advanced_salarys.advanced_salary')
        ->orderBy('id','DESC')
        ->get();
        return view('EmpSalary.add_salary',compact("salary"));
    }

    public function allSalary(){
        return view('EmpSalary.all_salary');
    }

    public function advancedSalary(){
        return view('EmpSalary.advanced_salary');
    }

    public function insetAdSalary(Request $request){
        $validatedData = $request->validate([
            'emp_id' => 'required',
            'monthdata' => 'required',
            'advanced_salary' => 'required',
        ]);
        $tmont=$request->monthdata;
        $tid=$request->emp_id;

        $advanced=DB::table('advanced_salarys')
                ->where('month',$tmont)
                ->where('emp_id',$tid)
                ->first();

                if ($advanced===null) {
                    # code...
                    $data=array();
                    $data['emp_id']=$request->emp_id;
                    $data['month']=$request->monthdata;
                    $data['advanced_salary']=$request->advanced_salary;

                    $insert=DB::table('advanced_salarys')->insert($data);
                    if ($insert) {
                        $notification = array(
                            'message' => ' added successfully!',
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
                }else{
                    $notification = array(
                        'message' => 'Oops!already give advanced in this month?',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }
    }

    public function allAdvancedSalary(){
        $salary=DB::table('advanced_salarys')
            ->join('employees','advanced_salarys.emp_id','employees.id')
            ->select('advanced_salarys.*','employees.name','employees.salary','employees.photo')
            ->orderBy('id','DESC')
            ->get();

            return view('EmpSalary.all_advanced_salary')->with('salary',$salary);
    }


}
