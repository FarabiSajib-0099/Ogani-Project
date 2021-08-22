@extends('layouts.frontend_app');

@section('frontend_content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend')}}/img/breadcrumb.jpg">
   <div class="container">
       <div class="row">
           <div class="col-lg-12 text-center">
               <div class="breadcrumb__text">
                   <h2>Checkout</h2>
                   <div class="breadcrumb__option">
                       <a href="./index.html">Home</a>
                       <span>Checkout</span>
                   </div>
               </div>
           </div>
       </div>
   </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
   <div class="container">
       <div class="row">
          
       </div>
       <div class="checkout__form">
           <h4>Shipping Details</h4>
           <form action="{{route('place.order')}}" method="post">
               @csrf
               <div class="row">
                   <div class="col-lg-8 col-md-6">
                       <div class="row">
                           <div class="col-lg-6">
                               <div class="checkout__input">
                                   <p>Fist Name<span>*</span></p>
                                   <input type="text" name="shipping_first_name" value="{{Auth::user()->name}}">
                               </div>
                           </div>
                           <div class="col-lg-6">
                               <div class="checkout__input">
                                   <p>Last Name<span>*</span></p>
                                   <input type="text" name="shipping_last_name">
                               </div>
                           </div>
                       </div>
                       <div class="row">
                       <div class="col-lg-6">
                        <div class="checkout__input">
                            <p>Phone<span>*</span></p>
                            <input type="text" name="phone">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout__input">
                            <p>Email<span>*</span></p>
                            <input type="text" name="email" value="{{Auth::user()->email}}">
                        </div>
                    </div>
                </div>
                       <div class="checkout__input">
                           <p>Address<span>*</span></p>
                           <input type="text" placeholder="Street Address" class="checkout__input__add" name="address">
                           
                       </div>
                     
                       <div class="checkout__input">
                           <p>Country/State<span>*</span></p>
                           <input type="text" name="state">
                       </div>
                       <div class="checkout__input">
                           <p>Postcode / ZIP<span>*</span></p>
                           <input type="text" name="post_code">
                       </div>
                      
                       {{-- <div class="checkout__input__checkbox">
                           <label for="acc">
                               Create an account?
                               <input type="checkbox" id="acc">
                               <span class="checkmark"></span>
                           </label>
                       </div>
                       <p>Create an account by entering the information below. If you are a returning customer
                           please login at the top of the page</p>
                       <div class="checkout__input">
                           <p>Account Password<span>*</span></p>
                           <input type="text">
                       </div>
                       <div class="checkout__input__checkbox">
                           <label for="diff-acc">
                               Ship to a different address?
                               <input type="checkbox" id="diff-acc">
                               <span class="checkmark"></span>
                           </label>
                       </div>
                       <div class="checkout__input">
                           <p>Order notes<span>*</span></p>
                           <input type="text"
                               placeholder="Notes about your order, e.g. special notes for delivery.">
                       </div> --}}
                   </div>
                   <div class="col-lg-4 col-md-6">
                       <div class="checkout__order">
                           <h4>Your Order</h4>
                           <div class="checkout__order__products">Products <span>Total</span></div>
                           <ul>
                               @foreach ($carts as $cart)
                               <li>{{$cart->product_img->product_name}}<span>Taka{{$cart->product_img->price}}</span></li>   
                               @endforeach
                             
                              
                           </ul>
                        
                          @if (Session::has('coupon'))
                          <div class="checkout__order__subtotal">Subtotal <span>TK{{$total - session()->get('coupon')['discount_amount']}}</span></div> 
                          <input type="hidden" name="coupon_discount" value="{{session()->get('coupon')['discount']}}">
                          <input type="hidden" name="subtotal" value="{{$total}}">
                          <input type="hidden" name="total" value="{{$total-  session()->get('coupon')['discount_amount']}}">
                          @else
                          <div class="checkout__order__total">Total <span>Tk{{$total}}</span></div>
                          <input type="hidden" name="subtotal" value="{{$total}}">
                          <input type="hidden" name="total" value="{{$total}}">
                          @endif
                        
                          
                         <h5>Select Payment Method</h5>
                          
                           <div class="checkout__input__checkbox">
                               <label for="payment">
                                   Handcash
                                   <input type="checkbox" id="payment" name="payment_method" value="handcash">
                                   <span class="checkmark"></span>
                               </label>
                           </div>
                           <div class="checkout__input__checkbox">
                               <label for="paypal">
                                   Paypal
                                   <input type="checkbox" id="paypal" value="paypal" name="payment_method">
                                   <span class="checkmark"></span>
                               </label>
                           </div>
                           <button type="submit" class="site-btn">PLACE ORDER</button>
                       </div>
                   </div>
               </div>
           </form>
       </div>
   </div>
</section>
<!-- Checkout Section End -->
@endsection