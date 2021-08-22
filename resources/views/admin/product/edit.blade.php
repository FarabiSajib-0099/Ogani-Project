@extends('admin.admin_layouts')
@section('products')
    active show-sub
@endsection
@section('add-products')
    active
@endsection
@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Miniproject</a>
          <span class="breadcrumb-item active">Edit Product</span>
        </nav>
  
        <div class="sl-pagebody">
          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
          <div class="row row-sm">
            <div class="card pd-20 pd-sm-40">
               <h6 class="card-body-title">Edit Products</h6>
         
               <form action="{{route('update.product')}}" method="post" enctype="multipart/form-data" >
                  @csrf
                  <input type="hidden" name="product_id" value="{{$product->id}}">
               <div class="form-layout">
                 @if (session('message'))
                 <div class="alert alert-success alert-dismissable fade show">
                   <span>{{session('message')}}</span>
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>
                     
                 @endif
                 <div class="row mg-b-25">
                   <div class="col-lg-4">
                     <div class="form-group">
                       <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                       <input class="form-control" type="text" required name="product_name" value="{{$product->product_name}}" placeholder="Enter Product Name">
                       @error('product_name')
                           <strong class="text-danger">{{$message}}</strong>
                       @enderror
                     </div>
                   </div><!-- col-4 -->
                  
                   <div class="col-lg-4">
                     <div class="form-group">
                       <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                       <input class="form-control"  type="text" name="product_code" value="{{$product->product_code}}" placeholder="Enter Product Code">
                       @error('product_code')
                       <strong class="text-danger">{{$message}}</strong>
                   @enderror
                     </div>
                   </div><!-- col-4 -->
                   <div class="col-lg-4">
                     <div class="form-group">
                       <label class="form-control-label">Product Price: <span class="tx-danger">*</span></label>
                       <input class="form-control" type="number" name="product_price" value="{{$product->price}}" placeholder="Enter Product Price">
                       @error('product_price')
                       <strong class="text-danger">{{$message}}</strong>
                   @enderror
                     </div>
                   </div><!-- col-4 -->
                   <div class="col-lg-4">
                     <div class="form-group">
                        <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_quantity" value="{{$product->product_quantity}}" placeholder="Enter Product Quantity">
                        @error('product_quantity')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                      </div>
                   </div><!-- col-4 -->
                   
                   <div class="col-lg-4">
                     <div class="form-group mg-b-10-force">
                       <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                       <select class="form-control select2" name="category_id" data-placeholder="Choose category">
                         <option label="Choose Category" ></option>
                         @foreach ($categories as $category)
                         <option value="{{$category->id}}" {{$category->id ==$product->category_id? "selected":""}}>{{$category->category_name}}</option>  
                         @endforeach
                 
                         
                       </select>
                       @error('category_id')
                       <strong class="text-danger">{{$message}}</strong>
                   @enderror
                     </div>
                   </div><!-- col-4 -->

                    
                   <div class="col-lg-4">
                     <div class="form-group mg-b-10-force">
                       <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                       <select class="form-control select2" name="brand_id" data-placeholder="Choose brand">
                         <option label="Choose Brand"></option>
                         @foreach ($brands as $brand)
                       
                          <option value="{{$brand->id}}" {{$brand->id ==$product->brand_id? "selected":""}}>{{$brand->brand_name}}</option>  
                         @endforeach
                 
                         
                       </select>
                       @error('brand_id')
                       <strong class="text-danger">{{$message}}</strong>
                   @enderror
                     </div>
                   </div><!-- col-4 -->
                   <div class="col-lg-12">
                     <div class="form-group mg-b-10-force">
                       <label class="form-control-label">Short Description: <span class="tx-danger">*</span></label>
                      <textarea   id="summernote" name="short_description" >{{$product->short_description}}</textarea>
                      @error('short_description')
                      <strong class="text-danger">{{$message}}</strong>
                  @enderror
                     </div>
                   </div><!-- col-4 -->
                   <div class="col-lg-12">
                     <div class="form-group mg-b-10-force">
                       <label class="form-control-label">Long Description: <span class="tx-danger">*</span></label>
                      <textarea   id="summernote2" name="long_description" >{{$product->long_description}}</textarea>
                      @error('long_description')
                      <strong class="text-danger">{{$message}}</strong>
                  @enderror
                     </div>
                   </div><!-- col-4 -->
                   <div class="col-lg-4">
                     <div class="form-layout-footer">
                       <button class="btn btn-info mg-r-5">Submit Form</button>
                  
                     </div><!-- form-layout-footer -->
                   </div><!-- row -->
                  </form>
               </div><!-- card -->
          </div>




          <div class="row row-sm">
            <div class="card pd-20 pd-sm-40">
               <h6 class="card-body-title">Edit Image</h6>
           
               <form action="{{route('update.image')}}" method="post" enctype="multipart/form-data" >
                  @csrf
                  <input type="hidden" name="product_id" value="{{$product->id}}">
                  <input type="hidden" name="img_one" value="{{$product->image_one}}">
                  <input type="hidden" name="img_two" value="{{$product->image_two}}">
                  <input type="hidden" name="img_three" value="{{$product->image_three}}">

               <div class="form-layout">
                
                 <div class="row mg-b-25">
                  <div class="col-lg-4">
                  
                     <div class="form-group">
                      
                     <img src="{{asset($product->image_one)}}"  width="50px" alt="">
                     </div>
                  <div class="form-group">
                    <label class="form-control-label">Product Thumbnail: <span class="tx-danger">*</span></label>
                   <input type="file" class="form-control"  name="image_one">
                   @error('image_one')
                   <strong class="text-danger">{{$message}}</strong>
               @enderror
                  </div>
                </div><!-- col-4 -->
                  
                <div class="col-lg-4">
                  
                  <div class="form-group">
                   
                  <img src="{{asset($product->image_two)}}"  width="50px" alt="">
                  </div>
               <div class="form-group">
                 <label class="form-control-label">Product Thumbnail: <span class="tx-danger">*</span></label>
                <input type="file" class="form-control"  name="image_two">
                @error('image_one')
                <strong class="text-danger">{{$message}}</strong>
            @enderror
               </div>
             </div><!-- col-4 -->

             <div class="col-lg-4">
                  
               <div class="form-group">
                
               <img src="{{asset($product->image_three)}}"  width="50px" alt="">
               </div>
            <div class="form-group">
              <label class="form-control-label">Product Thumbnail: <span class="tx-danger">*</span></label>
             <input type="file" class="form-control"  name="image_three">
             @error('image_one')
             <strong class="text-danger">{{$message}}</strong>
         @enderror
            </div>
          </div><!-- col-4 -->
                   
                  
                   
                  
                   <div class="col-lg-4">
                     <div class="form-layout-footer">
                       <button class="btn btn-info mg-r-5">Submit Form</button>
                  
                     </div><!-- form-layout-footer -->
                   </div><!-- row -->
                  </form>
               </div><!-- card -->
          </div>
                  
  
  
        
  
        </div><!-- sl-pagebody -->
        
      </div><!-- sl-mainpanel -->
      <!-- ########## END: MAIN PANEL ########## -->
@endsection