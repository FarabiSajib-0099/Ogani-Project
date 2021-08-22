<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use Illuminate\Support\Facades\Auth;
use App\Shipping;

class OrderController extends Controller
{
    public function orders(){
          
        $orders=Order::latest()->get();
        return view('admin.order.index',compact('orders'));
    }

    public function OrderView($order_id){


        $order=Order::findOrFail($order_id);
        $orderItems=OrderItem::where('order_id',$order_id)->get();
        $shipping=Shipping::where('order_id',$order_id)->first();

        return view('admin.order.view',compact('order','orderItems','shipping'));
    }


    public function myOrders(){
        
        $orders=Order::where('user_id',Auth::id())->latest()->get();
       
        return view('frontpages.profile.index',compact('orders'));
    }


    
    public function userOrder($order_id){
        
        $orders=Order::where('user_id',Auth::id())->latest()->get();
        $orderItems=OrderItem::where('order_id',$order_id)->get();
        $shippings=Shipping::where('order_id',$order_id)->first();
        return view('frontpages.profile.order-view',compact('orders','orderItems','shippings'));
    }
}
