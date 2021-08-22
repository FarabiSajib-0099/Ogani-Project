@extends('layouts.frontend_app');

@section('frontend_content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend')}}/img/breadcrumb.jpg">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 text-center">
                  <div class="breadcrumb__text">
                      <h2>Wishlist Page</h2>
                      <div class="breadcrumb__option">
                          <a href="./index.html">Home</a>
                          <a href="./index.html">Vegetables</a>
                          <span>Wishlis Paget</span>
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
                          
                               <th>Add to Cart</th>
                               <th></th>
                           </tr>
                       </thead>
                       <tbody>
                          @foreach ($wishlists as $wishlist)
                              
                
                           <tr>
                               <td class="shoping__cart__item">
                                   <img src="{{$wishlist->product_img->image_one}}" width="100px" alt="">
                                   <h5>{{$wishlist->product_img->product_name}}</h5>
                               </td>
                               <td class="shoping__cart__price">
                                   Tk{{$wishlist->product_img->price}}
                               </td>
                               <form action="{{url('add/tocart/'.$wishlist->id)}}" method="post">
                                @csrf
                               <td class="shoping__cart__price">
                               <button type="submit" href="" class="btn-sm btn-info">Add to cart</button>
                             </td>
                            </form>
                               <td class="shoping__cart__item__close">
                                  <a href="{{url('wishlist/destroy/'.$wishlist->id)}}">  <span class="icon_close"></span></a>
                                 
                               </td>
                           </tr>
                           @endforeach   
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
       
   </div>
</section>
<!-- Shoping Cart Section End -->


  @endsection