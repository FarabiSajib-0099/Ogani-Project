@extends('layouts.frontend_app');

@section('frontend_content'))


<div class="container">
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend')}}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>My Profile</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>My Profile</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </section>
    <div class="row mt-5 mb-3">
        <div class="col-sm-4">
         @include('frontpages.profile.inc.sidebar')
        </div>
        <div class="col-sm-8">
          <div class="card">
            <div class="card-body">
               <h6 class="card-body-title">Active Coupon List</h6>
               
               <div class="table-wrapper">
                 <table id="datatable1" class="table display responsive nowrap">
                   <thead>
                     <tr>
                       <th class="wd-15p">Serial</th>
                       <th class="wd-15p">Invoice No:</th>
                       <th class="wd-15p">Payement Type</th>
                       <th class="wd-20p">Total</th>
                       <th class="wd-20p">Sub Total</th>
                       <th>View</th>
                     
                       {{-- <th class="wd-10p">Salary</th>
                       <th class="wd-25p">E-mail</th> --}}
                     </tr>
                   </thead>
                   <tbody>
                       @php
                           $i=1;
                       @endphp
                       @foreach ($orders as $order)
                     <tr>
                       {{-- <td>Donna</td>
                       <td>Snider</td> --}}
                 
                           
                   
                       <td>{{$i++}}</td>
                       <td>{{$order->invoice_no}}</td>
                       <td>{{$order->payment_type}}</td>
                       <td>{{$order->total}} Taka</td>
                       <td>{{$order->sub_total}} Taka</td>
                       
                     
                     
                
                     </tr>
                     @endforeach
                   </tbody>
                 </table>
               </div><!-- table-wrapper -->
            </div>
          </div>
        </div>
      </div>


      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                  <h6 class="card-body-title">Shipping</h6>
                  
                  <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                      <thead>
                        <tr>
                          <th class="wd-15p">Serial</th>
                          <th class="wd-15p">Shipping First Name:</th>
                          <th class="wd-15p">Shipping Last Name</th>
                          <th class="wd-20p">Email</th>
                          <th class="wd-20p">Phone</th>
                          <th class="wd-20p">Adress</th>
                          <th class="wd-20p">State</th>
                          <th class="wd-20p">Post Code</th>
                          
                        
                          {{-- <th class="wd-10p">Salary</th>
                          <th class="wd-25p">E-mail</th> --}}
                        </tr>
                      </thead>
                      <tbody>
                          @php
                              $i=1;
                          @endphp
                
                        <tr>
                          {{-- <td>Donna</td>
                          <td>Snider</td> --}}
                    
                              
                      
                          <td>{{$i++}}</td>
                          <td>{{$shippings->shipping_first_name}}</td>
                          <td>{{$shippings->shipping_last_name}}</td>
                          <td>{{$shippings->shipping_email}} </td>
                          <td>{{$shippings->phone}} </td>
                          <td>{{$shippings->address}}</td>
                          <td>{{$shippings->state}}</td>
                          <td>{{$shippings->post_code}}</td>
                        
                        
                   
                        </tr>
             
                      </tbody>
                    </table>
                  </div><!-- table-wrapper -->
               </div>
             </div>
         </div>
         
         <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                  <h6 class="card-body-title">Order Item</h6>
                  
                  <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                      <thead>
                        <tr>
                          <th class="wd-15p">Image</th>
                          <th class="wd-15p">Product Name:</th>
                          <th class="wd-15p">Product Code:</th>
                          <th class="wd-15p">Product Quantity:</th>
                         
                          
                        
                          {{-- <th class="wd-10p">Salary</th>
                          <th class="wd-25p">E-mail</th> --}}
                        </tr>
                      </thead>
                      <tbody>
                          @php
                              $i=1;
                          @endphp
                
                        <tr>
                          {{-- <td>Donna</td>
                          <td>Snider</td> --}}
                    
                              @foreach ($orderItems as $item)
                                  
                         
                          <td><img src="{{asset($item->product->image_one)}}" width="50px" alt=""></td>
                          <td>{{$item->product->product_name}}</td>
                          <td>{{$item->product->product_code}}</td>
                          <td>{{$item->product->product_quantity}}</td>
                          
                          @endforeach
                      
                   
                        </tr>
             
                      </tbody>
                    </table>
                  </div><!-- table-wrapper -->
               </div>
             </div>
         </div>
         </div>
      </div>
</div>

@endsection
