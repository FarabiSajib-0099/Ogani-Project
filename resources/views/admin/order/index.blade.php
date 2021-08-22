@extends('admin.admin_layouts')
@section('orders')
    active
@endsection
@section('admin_content')


<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
   <nav class="breadcrumb sl-breadcrumb">
     <a class="breadcrumb-item" href="index.html">Miniproject</a>
     <span class="breadcrumb-item active">Orders</span>
   </nav>

   <div class="sl-pagebody">
      
     <div class="row row-sm">
  
       <div class="col-sm-12 col-xl-12">
          
           @if (session('b_msg'))
           <div class="aler alert-danger">{{session('b_msg')}}</div>

           @endif
             <div class="card pd-20 pd-sm-40">
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
                       <th class="wd-15p">Action</th>
                       <th class="wd-15p">View</th>
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
                     
                       <td>
                       
                           @if ( $order->coupon_discount==NULL)
                         
                           <span class="badge badge-danger">No</span>  
                           @else

                               <span class="badge badge-success">Yes</span>     
                           @endif  
                         
                       </td>
                    <td>
                           <a href="{{url('admin/order/view/'.$order->id)}}" class="btn-sm btn-info"><i class="fa fa-eye"></i></a>
                           
                          
                         
                       </td> 
                   
                     </tr>
                     @endforeach
                   </tbody>
                 </table>
               </div><!-- table-wrapper -->
             </div><!-- card -->
       </div>
     </div><!-- row -->

   

   </div><!-- sl-pagebody -->
   
 </div><!-- sl-mainpanel -->
 <!-- ########## END: MAIN PANEL ########## -->

@endsection