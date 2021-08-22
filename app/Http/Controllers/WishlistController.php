<?php

namespace App\Http\Controllers;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function AddWishlist($product_id){

        if(Auth::check()){
            Wishlist::insert([
                'user_id'=>Auth::id(),
                'product_id'=>$product_id,
             ]);
             return redirect()->back()->with('msg','Product added on Wishlist');
        }
        else{
            return redirect()->route('login')->with('login_msg','At first login your account');
        }
        

    }


    public function WishlistPage(){
     
        $wishlists=Wishlist::where('user_id',Auth::id())->latest()->get();

        return view('frontpages.wishlist',compact('wishlists'));
    
    }


    public function WishlistDestroy($wishlists_id){
        
        Wishlist::where('id',$wishlists_id)->where('user_id',Auth::id())->delete();
     return redirect()->back()->with('msg','Product removed from Wishlist');
    }
}
