<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\Session;
use App\Coupon;
use Carbon\Carbon;

class CartController extends Controller
{
 public function AddCart(Request $request, $product_id){
     $check=Cart::where('product_id',$product_id)->where('user_ip',request()->ip())->first();
       if($check){
   
        Cart::where('product_id',$product_id)->where('user_ip',request()->ip())->increment('quantity');
        return redirect()->back()->with('msg','Product added on cart');
       }else{
        Cart::insert([
            'product_id'=>$product_id,
            'quantity'=>1,
            'price'=>$request->price,
            'user_ip'=>request()->ip(),
            'created_at'=>Carbon::now(),
       ]);
       return redirect()->back()->with('msg','Product added on cart');
       }
   
 }


 //=========CartPage========

 public function CartPage(){
    $total=Cart::all()->where('user_ip',request()->ip())->sum(function($t){
        return $t->price * $t->quantity;
     });
     $carts=Cart::where('user_ip',request()->ip())->latest()->get();
     return view('frontpages.cart',compact('carts','total'));
 }

 public function CartDestroy($cart_id){
     Cart::where('id',$cart_id)->where('user_ip',request()->ip())->delete();
     return redirect()->back()->with('msg','Product removed from cart');

 }


 public function QuantityUpdate(Request $request,$cart_id){

       Cart::where('id',$cart_id)->where('user_ip',request()->ip())->update([
           'quantity'=>$request->quantity,
       ]);
       return redirect()->back()->with('msg','Your Quantity Updated');
 }



 //Apply coupon

 public function ApplyCoupon(Request $request){
      $check=Coupon::where('coupon_name',$request->coupon_name)->first();
      if($check){

        $total=Cart::all()->where('user_ip',request()->ip())->sum(function($t){
            return $t->price * $t->quantity;
         });
       Session::put('coupon',[
           'coupon_name'=>$check->coupon_name,
           'discount'=>$check->discount,
           'discount_amount'=>$total * $check->discount/100,

       ]);
       return redirect()->back()->with('msg','Successfully Coupon Applied');

      }
      else{
        return redirect()->back()->with('msg','Invalid Coupon');
      }
      }
 
}
