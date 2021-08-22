<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    } 
    public function index(){
        $coupons=Coupon::latest()->get();
        return view('admin.coupon.index',compact('coupons'));
    }

    public function addCoupon(Request $request){
        $request->validate([
            'coupon_name'=>'required|unique:brands,brand_name'
        ]) ;

        Coupon::insert([
            'coupon_name'=>strtoupper($request->coupon_name),
            'discount'=>$request->discount,
            'created_at'=>Carbon::now(),

        ]);
        return back()->with('couponadd','Your Coupon added Success');

    }


    public function Edit($coupon_id){
        $coupon=Coupon::findOrFail($coupon_id);
        return view('admin.coupon.edit',compact('coupon'));

    }


    public function UpdateCoupon(Request $request){
          $coupon_id=$request->coupon_id;

          Coupon::find($coupon_id)->update([
              'coupon_name'=>$request->coupon_name,
              'discount'=>$request->discount,
              'updated_at'=>Carbon::now(),
          ]);
          return redirect()->route('add.coupon')->with('msg','Your Coupon Name Updated success');

    }

    public function DeleteCoupon($coupon_id){
        Coupon::findOrFail($coupon_id)->delete();
        return back()->with('msg','Your Coupon deleted');

    }

    public function Inactive($coupon_id){
        Coupon::find($coupon_id)->update([
            'status'=>0,
        ]);
        return back()->with('msg','Your Coupon Inactivate');
    }

    public function Active($coupon_id){
        Coupon::find($coupon_id)->update([
            'status'=>1,
        ]);
        return back()->with('msg','Your Coupon Activate');
    }
 


}
