<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Session;
class FrontendController extends Controller
{
    public function index(){
        $products=Product::where('status',1)->get();
        $latest_product=Product::where('status',1)->latest()->limit(3)->get();
        $categories=Category::where('status',1)->get();
        return view('frontpages.index',compact('products','categories','latest_product'));
    }

    
  public function ProductDetails($product_id){
      $product_info=Product::findOrFail($product_id);
      $category_id=$product_info->category_id;
      $related_p=Product::where('category_id',$category_id)->where('id','!=',$product_id)->latest()->get();
    return view('frontpages.product-details',compact('product_info','related_p'));
}



public function CouponDestroy(){
    if(Session::has('coupon')){
        session()->forget('coupon');

        return back()->with('couponremove','Your Coupon Is Delete Successful');
    }
}


public function shoppage(){
    $products=Product::latest()->get();
    $categories=Category::where('status',1)->latest()->get();
    $pagination=Product::latest()->paginate(10);
    return view('frontpages.shop',compact('products','categories','pagination'));
}

public function showCategory ($category_id){
    $products=Product::where('category_id',$category_id)->latest()->paginate(9);
    $categories=Category::where('status',1)->latest()->get();
    return view('frontpages.cat-product',compact('products','categories'));
}


}
