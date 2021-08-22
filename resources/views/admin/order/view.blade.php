@extends('admin.admin_layouts')
@section('orders')
    active
@endsection
@section('admin_content')
   <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Forms</a>
        <span class="breadcrumb-item active">Form Layouts</span>
      </nav>

      <div class="sl-pagebody">

        
       <div class="card pd-20 pd-sm-40">
         <h6 class="card-body-title">Orders Items</h6>
         
         <div class="form-layout">
           <div class="row mg-b-25">
             <div class="col-lg-8 m-auto">
               <div class="form-group">
                  <table class="table">
                     <thead>
                       <tr>
                         <th scope="col">Image</th>
                         <th scope="col">Prduct Name</th>
                         <th scope="col">Quantity</th>
                     
                       </tr>
                     </thead>
                     <tbody>
                        @foreach ($orderItems as $item)
                            
                     
                       <tr>
                       <td> <img src="{{asset($item->product->image_one)}}" width="50px" alt=""></td>
                         <td>{{$item->product->product_name}}</td>
                         <td>{{$item->product_quantity}}</td>
                         
                       </tr>
                       @endforeach
                     </tbody>
                   </table>
               </div>
             </div><!-- col-4 -->
             
             
             
           </div><!-- row -->

           
         </div><!-- form-layout -->
       </div><!-- card --> 
      
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Shipping Information</h6>
          
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Firstname: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="firstname" readonly value="{{$shipping->shipping_first_name}}" placeholder="Enter firstname">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Lastname: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="lastname" readonly value="{{$shipping->shipping_last_name}}" placeholder="Enter lastname">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Email address: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="email" readonly value="{{$shipping->shipping_email}}" placeholder="Enter email address">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Shipping Phone: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="address" readonly value="{{$shipping->phone}}" placeholder="Enter address">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
               <div class="form-group mg-b-10-force">
                 <label class="form-control-label">Shipping Address: <span class="tx-danger">*</span></label>
                 <input class="form-control" type="text" name="address" readonly value="{{$shipping->address}}" placeholder="Enter address">
               </div>
             </div><!-- col-4 -->
             <div class="col-lg-4">
               <div class="form-group mg-b-10-force">
                 <label class="form-control-label">State: <span class="tx-danger">*</span></label>
                 <input class="form-control" type="text" name="address" readonly value="{{$shipping->state}}" placeholder="Enter address">
               </div>
             </div><!-- col-4 -->
             <div class="col-lg-4">
               <div class="form-group mg-b-10-force">
                 <label class="form-control-label">Post Code: <span class="tx-danger">*</span></label>
                 <input class="form-control" type="text" name="address" readonly value="{{$shipping->post_code}}" placeholder="Enter address">
               </div>
             </div><!-- col-4 -->
              
              
            </div><!-- row -->

            
          </div><!-- form-layout -->
        </div><!-- card -->
        <hr>
        <div class="card pd-20 pd-sm-40">
         <h6 class="card-body-title">Orders</h6>
         
         <div class="form-layout">
           <div class="row mg-b-25">
             <div class="col-lg-4">
               <div class="form-group">
                 <label class="form-control-label">Invoice No: <span class="tx-danger">*</span></label>
                 <input class="form-control" type="text" name="firstname" readonly value="{{$order->invoice_no}}" placeholder="Enter firstname">
               </div>
             </div><!-- col-4 -->
             <div class="col-lg-4">
               <div class="form-group">
                 <label class="form-control-label">Payment Method: <span class="tx-danger">*</span></label>
                 <input class="form-control" type="text" name="lastname" readonly value="{{$order->payment_type}}" placeholder="Enter lastname">
               </div>
             </div><!-- col-4 -->
             <div class="col-lg-4">
               <div class="form-group">
                 <label class="form-control-label">Total: <span class="tx-danger">*</span></label>
                 <input class="form-control" type="text" name="email" readonly value="{{$order->total}}" placeholder="Enter email address">
               </div>
             </div><!-- col-4 -->
             <div class="col-lg-4">
               <div class="form-group mg-b-10-force">
                 <label class="form-control-label">Sub Total: <span class="tx-danger">*</span></label>
                 <input class="form-control" type="text" name="address" readonly value="{{$order->sub_total}}" placeholder="Enter address">
               </div>
             </div><!-- col-4 -->
             <div class="col-lg-4">
               <div class="form-group mg-b-10-force">
                 <label class="form-control-label">Coupon Discount: <span class="tx-danger">*</span></label>
                      @if ($order->coupon_discount==NULL)
                          <span class="badge badge-danger">No</span>
                      @else
                      <span class="badge badge-success">{{$order->coupon_discount}}%</span>
                      @endif
               </div>
             </div><!-- col-4 -->
        
             
             
           </div><!-- row -->

           
         </div><!-- form-layout -->
       </div><!-- card -->

       <hr>

      

      </div><!-- sl-pagebody -->
      @endsection