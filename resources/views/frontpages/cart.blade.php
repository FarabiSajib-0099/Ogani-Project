@extends('layouts.frontend_app');

@section('frontend_content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend')}}/img/breadcrumb.jpg">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 text-center">
                  <div class="breadcrumb__text">
                      <h2>Vegetable’s Package</h2>
                      <div class="breadcrumb__option">
                          <a href="./index.html">Home</a>
                          <a href="./index.html">Vegetables</a>
                          <span>Vegetable’s Package</span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- Breadcrumb Section End -->
<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
   <div class="container">
       <div class="row">
           <div class="col-lg-12">
               <div class="shoping__cart__table">
                 
                   <table>
                    
                       <thead>
                           <tr>
                               <th class="shoping__product">Products</th>
                               <th>Price</th>
                               <th>Quantity</th>
                               <th>Total</th>
                               <th></th>
                           </tr>
                       </thead>
                       <tbody>
                          @foreach ($carts as $cart)
                              
                
                           <tr>
                               <td class="shoping__cart__item">
                                   <img src="{{$cart->product_img->image_one}}" width="100px" alt="">
                                   <h5>{{$cart->product_img->product_name}}</h5>
                               </td>
                               <td class="shoping__cart__price">
                                   Tk{{$cart->product_img->price}}
                               </td>
                               <td class="shoping__cart__quantity">
                                  <form action="{{url('cart/quantity/update/'.$cart->id)}}" method="post">
                                    @csrf
                                   <div class="quantity">
                                       <div class="pro-qty">
                                           <input type="text" name="quantity" value="{{$cart->quantity}}">
                                       </div>
                                       <button class="badge badge-success">Update</button>
                                   </div>
                                 </form>
                               </td>
                               <td class="shoping__cart__total">
                                  tk{{$cart->quantity *  $cart->price}}
                               </td>
                               <td class="shoping__cart__item__close">
                                  <a href="{{url('cart/destroy/'.$cart->id)}}">  <span class="icon_close"></span></a>
                                 
                               </td>
                           </tr>
                           @endforeach   
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
       <div class="row">
           <div class="col-lg-12">
               <div class="shoping__cart__btns">
                   <a href="{{url('/')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                   {{-- <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                    Upadate Cart</a> --}}
               </div>
           </div>
           
           <div class="col-lg-6">
            @if (Session::has('coupon'))

            @else
            <div class="shoping__continue">
                @if (session('couponadd'))
                <div class="alert alert-success alert-dismissable fade show">
                  <span>{{session('couponadd')}}</span>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                    
                @endif
                
                <div class="shoping__discount">
                    <h5>Discount Codes</h5>
                    <form action="{{url('apply/coupon')}}" method="post">
                     @csrf
                        <input type="text" placeholder="Enter your coupon code" name="coupon_name">
                        <button type="submit" class="site-btn">APPLY COUPON</button>
                    </form>
                </div>
            </div>  
         
            
            @endif
            
        </div>   
           <div class="col-lg-6">
            @if (session('couponremove'))
            <div class="alert alert-success alert-dismissable fade show">
              <span>{{session('couponremove')}}</span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                
            @endif
               <div class="shoping__checkout">
                   <h5>Cart Total</h5>
                   <ul>
                    @if (Session::has('coupon')) 
                       <li>Subtotal <span>TK{{$total}}</span></li>
                       <li>Coupon Name <span>{{session()->get('coupon')['coupon_name']}}   <a href="{{url('coupon/destroy')}}">&times;</a></span>
                      
                    </li>
                       <li>Discount <span>{{session()->get('coupon')['discount']}} % ({{session()->get('coupon')['discount_amount']}})</span></li>
                       {{-- <li>Total <span>Tk{{$total * session()->get('coupon')['discount'] \ 100}}</span></li> --}}
                       <li>Subtotal <span>TK{{$total - session()->get('coupon')['discount_amount']}}</span></li>
                    @else
                    <li>Total <span>TK{{$total}}</span></li>
                    @endif
                   </ul>
                   <a href="{{url('checkout')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
               </div>
           </div>
       </div>
   </div>
</section>
<!-- Shoping Cart Section End -->


  @endsection