@extends('admin.admin_layouts')
@section('coupon')
    active
@endsection
@section('admin_content')


<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
   <nav class="breadcrumb sl-breadcrumb">
     <a class="breadcrumb-item" href="index.html">Miniproject</a>
     <span class="breadcrumb-item active">Coupon</span>
   </nav>

   <div class="sl-pagebody">
      
     <div class="row row-sm">
       <div class="col-sm-6 col-xl-3">
          <div class="card p-5 mb-3">
             <div class="card-header">Add Coupon</div>
            

             @if (session('msg'))
             <div class="alert alert-success alert-dismissable fade show">
               <span>{{session('msg')}}</span>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
                 
             @endif
             <form method="post" action="{{url('add/coupons')}}" enctype="multipart/form-data">
                 @csrf
                 <div class="mb-3">
                     <label for="couponname" class="form-label">Coupon Name</label>
                     <input type="text" class="form-control" value="{{old('couponname')}}" id="couponname"
                         name="coupon_name" placeholder="Enter Coupon Name">
                     @error('brand_name')
                     <span class="text-danger">{{$message}}</span>
                     @enderror

                 </div>
                 <div class="mb-3">
                  <label for="couponname" class="form-label">Coupon Discount</label>
                  <input type="discount" class="form-control" value="{{old('discount')}}" id="discount"
                      name="discount" placeholder="Enter Coupon discount %">
                  @error('discount')
                  <span class="text-danger">{{$message}}</span>
                  @enderror

              </div>
                 {{-- <div class="mb-3">
                     <label for="categorydescription" class="form-label">Category Description</label>
                     <textarea class="form-control" name="cat_des" id="categorydescription"
                         cols="4">{{old('cat_des')}}</textarea>

                     @error('cat_des')
                     <span class="text-danger">{{$message}}</span>
                     @enderror

                 </div> --}}
                 {{-- <div class="mb-3">
                     <label for="categorydescription" class="form-label">Category Photo</label>
                     <input type="file" class="form-control" name="category_photo">

                     @error('cat_des')
       <span class="text-danger">{{$message}}</span>
                     @enderror

                 </div> --}}
                 <button type="submit" class="btn btn-primary">Add Coupon</button>
             </form>

         </div>

       </div>
       <div class="col-sm-6 col-xl-9">
          
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
                       <th class="wd-15p">Coupon Name</th>
                       <th class="wd-15p">Coupon Discount</th>
                       <th class="wd-20p">Status</th>
                       <th class="wd-15p">Action</th>
                       {{-- <th class="wd-10p">Salary</th>
                       <th class="wd-25p">E-mail</th> --}}
                     </tr>
                   </thead>
                   <tbody>
                       @php
                           $i=1;
                       @endphp
                       @foreach ($coupons as $coupon)
                     <tr>
                       {{-- <td>Donna</td>
                       <td>Snider</td> --}}
                 
                           
                   
                       <td>{{$i++}}</td>
                       <td>{{$coupon->coupon_name}}</td>
                       <td>{{$coupon->discount}}%</td>
                       <td>
                       
                           @if ( $coupon->status==1)
                         
                           <span class="badge badge-success">Active</span>  
                           @else

                               <span class="badge badge-success">Inactive</span>     
                           @endif  
                         
                       </td>
                       <td>
                           <a href="{{url('coupon/edit/'.$coupon->id)}}" class="btn-sm btn-info"><i class="fa fa-pencil"></i></a>|<a href="{{url('coupon/delete/'.$coupon->id)}}" class="btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                           
                           @if ( $coupon->status==1)
                           <a href="{{url('coupon/inactive/'.$coupon->id)}}" class="btn-sm btn-warning"><i class="fa fa-arrow-down"></i></a>
                           @else
                           <a href="{{url('coupon/active/'.$coupon->id)}}" class="btn-sm btn-success"><i class="fa fa-arrow-up"></i></a>  
                           @endif
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