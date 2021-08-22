<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use Carbon\Carbon;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $brands=Brand::latest()->get();
        return view('admin.brand.index',compact('brands'));

    }

    public function addbrand(Request $request){
        $request->validate([
            'brand_name'=>'required|unique:brands,brand_name',
        ]);

        Brand::insert([
         'brand_name'=> $request->brand_name,
         'created_at'=>Carbon::now(),
        ]);
        return back()->with('message','Brand Added Success');

    }

    public function Edit($brand_id){
        $brand=Brand::find($brand_id);
        return view('admin.brand.edit',compact('brand'));

    }
    public function UpdateBrand(Request $request){
        // dd($request->cat_id);
        // $cat_id=$request->id;
        Brand::find($request->brand_id)->update([
            'brand_name'=> $request->brand_name,
            'updated_at'=>Carbon::now()
        ]);
        return redirect()->back()->with('msg','Brand Name Updated');
    }
   
   public function DeleteBrand($brand_id){
       Brand::find($brand_id)->delete();
       return back()->with('msd','Brand Name deleted');
   }
 
   public function Inactive($brand_id){
    Brand::find($brand_id)->update(['status'=>0]);
    return back();

}


public function Active($brand_id){
    Brand::find($brand_id)->update(['status'=>1]);
    return back();

}
    

}
