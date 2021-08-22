<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use Image;
use Carbon\Carbon;
class ProductController extends Controller
{
 
   public function __construct()
   {
       $this->middleware('auth:admin');
   }
//=======Add Product=========
   public function addProduct(){
       $categories=Category::latest()->get();
       $brands=Brand::latest()->get();
 return view('admin.product.add',compact('categories','brands'));
   }


   //store products

   public function storeProduct(Request $request){
       
        $request->validate([ 
            'product_name'=>'required|max:255',
            'product_code'=>'required|max:255',
            'product_price'=>'required|max:255',
            'product_quantity'=>'required|max:255',
            'category_id'=>'required|max:255',
            'brand_id'=>'required|max:255',
            'short_description'=>'required',
            'long_description'=>'required',
            'image_one'=>'required|mimes:jpeg,jpg,png,gif',
            'image_two'=>'required|mimes:jpeg,jpg,png,gif',
            'image_three'=>'required|mimes:jpeg,jpg,png,gif',


        ],[
            'category_id.required'=>'Select Category Name',
            'brand_id.required'=>'Select Brand  Name',
        ]);

        $image_one=$request->file('image_one');
        $name_generate=hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
        Image::make($image_one)->resize(270,270)->save('frontend/img/product/uploads/'.$name_generate);
        $img_url1='frontend/img/product/uploads/'.$name_generate;
         

        $image_two=$request->file('image_two');
        $name_generate=hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
        Image::make($image_two)->resize(270,270)->save('frontend/img/product/uploads/'.$name_generate);
        $img_url2='frontend/img/product/uploads/'.$name_generate;


        $image_three=$request->file('image_three');
        $name_generate=hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
        Image::make($image_three)->resize(270,270)->save('frontend/img/product/uploads/'.$name_generate);
        $img_url3='frontend/img/product/uploads/'.$name_generate;


        Product::insert([
            'category_id'=>$request->category_id,
            'brand_id'=>$request->brand_id,
            'product_name'=>$request->product_name,
            'product_slug'=>strtolower(str_replace(' ','-',$request->product_name)),
            'product_code'=>$request->product_code,
            'product_quantity'=>$request->product_quantity,
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description,
            'price'=>$request->product_price,
            'image_one'=>$img_url1,
            'image_two'=>$img_url2,
            'image_three'=>$img_url3,
            'created_at'=>Carbon::now(),
           

       ]);
       return redirect()->back()->with('message','Your Product Added Successful');
    

   }

   //======Manage Product======
   public function manageProduct(){
       $products=Product::latest()->get();
       return view('admin.product.manage',compact('products'));
   }

   //===Product Crud=====

   public function Edit($product_id){
    $product=Product::findOrFail($product_id);
    $categories=Category::latest()->get();
       $brands=Brand::latest()->get();
    return view('admin.product.edit',compact('product','categories','brands'));

}
//===========Product Update=============

public function Update(Request $request){
    




Product::find($request->product_id)->update([
    'category_id'=>$request->category_id,
    'brand_id'=>$request->brand_id,
    'product_name'=>$request->product_name,
    'product_slug'=>strtolower(str_replace(' ','-',$request->product_name)),
    'product_code'=>$request->product_code,
    'product_quantity'=>$request->product_quantity,
    'short_description'=>$request->short_description,
    'long_description'=>$request->long_description,
    'price'=>$request->product_price,
    'updated_at'=>Carbon::now(),
]);

return redirect()->route('manage.product')->with('msg','Your Product Updated Success');
}


public function imageUpdate(Request $request){
      
    $product_id=$request->product_id;
    $old_one=$request->img_one;
    $old_two=$request->img_two;
    $old_three=$request->img_three;
   
    if($request->has('image_one') && $request->has('image_two') && $request->has('image_three')){
     unlink($old_one);
     unlink($old_two);
     unlink($old_three);


     $image_one=$request->file('image_one');
     $name_generate=hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
     Image::make($image_one)->resize(270,270)->save('frontend/img/product/uploads/'.$name_generate);
     $img_url1='frontend/img/product/uploads/'.$name_generate;

     Product::findOrFail($product_id)->update([
            'image_one'=>$img_url1,
            'updated_at'=>Carbon::now(),
     ]);

     $image_two=$request->file('image_two');
    $name_generate=hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
    Image::make($image_two)->resize(270,270)->save('frontend/img/product/uploads/'.$name_generate);
    $img_url1='frontend/img/product/uploads/'.$name_generate;

    Product::findOrFail($product_id)->update([
           'image_two'=>$img_url1,
           'updated_at'=>Carbon::now(),
    ]);



    $image_three=$request->file('image_three');
    $name_gen=hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
    Image::make($image_three)->resize(270,270)->save('frontend/img/product/uploads/'.$name_gen);
    $img_url='frontend/img/product/uploads/'.$name_gen;

    // Product::findOrFail($product_id)->update([
    //        'image_three'=>$img_url,
    //        'updated_at'=>Carbon::now(),
    // ]);

    Product::where('id',$product_id)->update([
        'image_three'=>$img_url,
        'updated_at'=>Carbon::now(),
    ]);



    
     return redirect()->route('manage.product')->with('msg','Your Product Images Updated Success');
}


}
    


    //Product Delete

    public function Delete($product_id){

        $image=Product::findOrFail($product_id);
        $img_one=$image->image_one;
        $img_two=$image->image_two;
        $img_three=$image->image_three;
        unlink($img_one);
        unlink($img_two);
        unlink($img_three);
          Product::findOrFail($product_id)->delete();
          return back()->with('msg','Your Product Delete  Success');
    }

    public function Inactive($product_id){
          Product::findOrFail($product_id)->update(['status'=>0]);
          return back();
    }

    public function Active($product_id){
        Product::findOrFail($product_id)->update(['status'=>1]);
        return back();
  }





}


