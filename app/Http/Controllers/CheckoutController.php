<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;
class CheckoutController extends Controller
{
    public function CheckOut(){
        if(Auth::check()){
            $total=Cart::all()->where('user_ip',request()->ip())->sum(function($t){
                return $t->price * $t->quantity;
             });
             $carts=Cart::where('user_ip',request()->ip())->latest()->get();
          
            return view('frontpages.checkout',compact('total','carts'));
        }else{
            return redirect()->route('login');
        }
        
    }
}
