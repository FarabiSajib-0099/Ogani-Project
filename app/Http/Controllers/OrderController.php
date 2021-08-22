<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use App\Shipping;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Cart;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function placeOrder(Request $request){
      
        $request->validate([

            'shipping_first_name'=>'required',
            'shipping_last_name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'address'=>'required',
            'state'=>'required',
            'post_code'=>'required',
            

        ]);

    $order_id= Order::insertGetId([


        'user_id'=>Auth::id(),
        'invoice_no'=>mt_rand(100000000,999999999),
        'payment_type'=>$request->payment_method,
        'total'=>$request->total,
        'sub_total'=>$request->subtotal,
        'coupon_discount'=>$request->coupon_discount,
        'created_at'=>Carbon::now(),
    ]);

    $carts=Cart::where('user_ip',request()->ip())->latest()->get();
    foreach($carts as $cart){

  
    OrderItem::insert([
        'order_id'=>$order_id,
        'product_id'=>$cart->product_id,
        'product_quantity'=>$cart->quantity,
        'created_at'=>Carbon::now(),
    ]);




    }


    Shipping::insert([
        
        'order_id'=>$order_id,
        'shipping_first_name'=>$request->shipping_first_name,
        'shipping_last_name'=>$request->shipping_last_name,
        'phone'=>$request->phone,
        'shipping_email'=>$request->email,
        'address'=>$request->address,
        'state'=>$request->state,
        'post_code'=>$request->post_code,
        'created_at'=>Carbon::now(),
    ]);

    if(Session::has('coupon')){
        session()->forget('coupon');

       
    }
       Cart::where('user_ip',request()->ip())->delete();
    return redirect()->to('order/success')->with('couponremove','Your Coupon Is Delete Successful');
}

public function orderSuccess(){
    return view('frontpages.order');
}
}
