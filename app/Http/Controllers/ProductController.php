<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;
class ProductController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function product(){
        $product=DB::table('products')
            ->join('catagories','catagories.id','products.cat_id')
            ->select('products.*','catagories.catName')
            ->orderBy('products.id','DESC')
            ->get();
       return view('product.add_product')->with("product",$product);
        // echo "<pre>";
        // print_r($product);
    }

    public function addProduct(Request $request){
        $data=array();
        $data['product_name']=$request->pro_name;
        $data['cat_id']=$request->cat_id;
        $data['product_details']=$request->proDetails;
        $data['product_code']=str_random(6);
        $image=$request->photo;
        if($image){
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_ful_name=$image_name.'.'.$ext;
            $upload_path='public/product/';
            $image_url=$upload_path.$image_ful_name;

            $success=$image->move($upload_path, $image_ful_name);
            if($success){
                $data['product_image']=$image_url;
                $post=DB::table('products')->insert($data);
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
        }



    }

    public function deleteProduct($id){
       $del=DB::table('products')->where('id',$id)->first();
       unlink($del->product_image);
       $dele=DB::table('products')->where('id',$id)->delete();
       if($dele){
        $notification = array(
            'message' => ' delete successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }else{
        $notification = array(
            'message' => 'delete failed!Try again',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
    }

    public function updateProduct($id){
        $uppro=DB::table('products')->where('id',$id)->first();
        return view('product.edit_product')->with("uppro",$uppro);
    }

    public function editProduct(Request $request,$id){
        $data=array();
        $data['product_name']=$request->pro_name;
        $data['cat_id']=$request->cat_id;
        $data['product_details']=$request->proDetails;
        $image=$request->photo;

        if($image){
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_ful_name=$image_name.'.'.$ext;
            $upload_path='public/product/';
            $image_url=$upload_path.$image_ful_name;

            $success=$image->move($upload_path, $image_ful_name);
            if($success){
                $data['product_image']=$image_url;
                $img=DB::table('products')->where('id',$id)->first();
                $image_path=$img->product_image;
                unlink($image_path);

                $post=DB::table('products')->where('id',$id)->update($data);
                if($post){
                    $notification = array(
                        'message' => 'Update successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('add.product')->with($notification);
                }else{
                    $notification = array(
                        'message' => 'Update failed!Try again',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }
            }
        }else{

            $post=DB::table('products')->where('id',$id)->update($data);
                if($post){
                    $notification = array(
                        'message' => 'Update successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('add.product')->with($notification);
                }else{
                    $notification = array(
                        'message' => 'Update failed!Try again',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }

        }
    }

    //import and export product

    public function ImportProduct(){
        return view('product.import_product');
    }

    public function export(){
        return Excel::download(new ProductsExport, 'products.xlsx');

    }

    public function import(Request $request){
        $import=Excel::import(new ProductsImport,request()->file('import_file'));
        if($import){
            $notification = array(
                'message' => 'file upload successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'file upload failed!Try again',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
