@extends('admin.admin_layouts')
@section('brand')
    active
@endsection
@section('admin_content')


<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
   <nav class="breadcrumb sl-breadcrumb">
     <a class="breadcrumb-item" href="index.html">Miniproject</a>
     <span class="breadcrumb-item active">Brand</span>
   </nav>

   <div class="sl-pagebody">
      
     <div class="row row-sm">
       <div class="col-sm-6 col-xl-3">
          <div class="card p-5 mb-3">
             <div class="card-header">Add Brand</div>
             @if ($errors->all())
             <div class="alert alert-danger">
                 @foreach ($errors->all() as $error)
                 <li>{{$error}} </li>

                 @endforeach

             </div>

             @endif

             @if (session('message'))
             <div class="aler alert-success">{{session('message')}}</div>

             @endif
             <form method="post" action="{{url('add/brand')}}" enctype="multipart/form-data">
                 @csrf
                 <div class="mb-3">
                     <label for="brandname" class="form-label">Brand Name</label>
                     <input type="text" class="form-control" value="{{old('brand_name')}}" id="brandname"
                         name="brand_name" placeholder="Enter Brand Name">
                     @error('brand_name')
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
                 <button type="submit" class="btn btn-primary">Add Brand</button>
             </form>

         </div>

       </div>
       <div class="col-sm-6 col-xl-9">
          
           @if (session('b_msg'))
           <div class="aler alert-danger">{{session('b_msg')}}</div>

           @endif
             <div class="card pd-20 pd-sm-40">
               <h6 class="card-body-title">Active Brand List</h6>
               
               <div class="table-wrapper">
                 <table id="datatable1" class="table display responsive nowrap">
                   <thead>
                     <tr>
                       <th class="wd-15p">Serial</th>
                       <th class="wd-15p">Brand Name</th>
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
                       @foreach ($brands as $brand)
                     <tr>
                       {{-- <td>Donna</td>
                       <td>Snider</td> --}}
                 
                           
                   
                       <td>{{$i++}}</td>
                       <td>{{$brand->brand_name}}</td>
                       <td>
                       
                           @if ( $brand->status==1)
                         
                           <span class="badge badge-success">Active</span>  
                           @else

                               <span class="badge badge-success">Inactive</span>     
                           @endif  
                         
                       </td>
                       <td>
                           <a href="{{url('brand/edit/'.$brand->id)}}" class="btn-sm btn-info"><i class="fa fa-pencil"></i></a>|<a href="{{url('brand/delete/'.$brand->id)}}" class="btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                           
                           @if ( $brand->status==1)
                           <a href="{{url('brand/inactive/'.$brand->id)}}" class="btn-sm btn-warning"><i class="fa fa-arrow-down"></i></a>
                           @else
                           <a href="{{url('brand/active/'.$brand->id)}}" class="btn-sm btn-success"><i class="fa fa-arrow-up"></i></a>  
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