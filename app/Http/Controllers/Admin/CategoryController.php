<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Category;
class CategoryController extends Controller

{

      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        return view('admin.category.index',[
            'categories'=>Category::latest()->get()
           
        ]);
    }


 

    public function addcategory(Request $request){
        $request->validate([
            'category_name'=>'required|unique:categories,category_name',
        ]);

        Category::insert([
         'category_name'=> $request->category_name,
         'created_at'=>Carbon::now(),
        ]);
        return back()->with('message','Category Added Success');

    }

    public function Edit($cat_id){
        $category=Category::find($cat_id);
        return view('admin.category.edit',compact('category'));

    }

    public function UpdateCat(Request $request){
        // dd($request->cat_id);
        // $cat_id=$request->id;
        Category::find($request->cat_id)->update([
            'category_name'=> $request->category_name,
            'updated_at'=>Carbon::now()
        ]);
        return back();
    }


    public function delete($cat_id){
        Category::find($cat_id)->delete();
        return back()->with('d_msg','Category delete success');
    }


    public function Inactive($cat_id){
        Category::find($cat_id)->update(['status'=>0]);
        return back();

    }

    
    public function Active($cat_id){
        Category::find($cat_id)->update(['status'=>1]);
        return back();

    }
}
