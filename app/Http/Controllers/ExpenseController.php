<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addExpense(){
        return view('expenses.add_expense');
    }

    public function allExpense(){
        $expense=DB::table('expenses')
            ->leftJoin('suppliers','expenses.sup_id','suppliers.id')
            ->select('expenses.*','suppliers.name')
            ->get();
        return view('expenses.all_expense')->with("expenses",$expense);
    }

    public function editExpense($id){
        $expense=DB::table('expenses')
            ->where('id',$id)
            ->first();

            return view('expenses.edit_expense')->with("dataex",$expense);
    }

    public function insertExpenses(Request $request){
        $validatedData = $request->validate([

            'amount' => 'required',
        ]);
        $data=array();
        $data['sup_id']=$request->sup_id;
        $data['details']=$request->details;
        $data['amount']=$request->amount;
        $insert=DB::table('expenses')->insert($data);
        if($insert){
            $notification = array(
                'message' => ' added successfully!',
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

    public function updateExpense(Request $request,$id){
        $data=array();
        $data['sup_id']=$request->sup_id;
        $data['details']=$request->details;
        $data['amount']=$request->amount;


         $post=DB::table('expenses')->where('id',$id)->update($data);
                if($post){
                    $notification = array(
                        'message' => ' update successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('all.expense')->with($notification);
                }else{
                    $notification = array(
                        'message' => 'update failed!Try again',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }

    }

    public function deletePurchase($id){
        $post=DB::table('purchases')->where('id',$id)->delete();
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
