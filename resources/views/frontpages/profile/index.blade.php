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
                       <td>  <a href="{{url('user/order/view/'.$order->id)}}" class="btn-sm btn-info"><i class="fa fa-eye"></i></a>
                       </td>
                     
                     
                
                     </tr>
                     @endforeach
                   </tbody>
                 </table>
               </div><!-- table-wrapper -->
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
