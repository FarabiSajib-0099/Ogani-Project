@extends('admin.admin_layouts')
@section('products')
    active show-sub
@endsection
@section('manage-products')
    active
@endsection
@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Miniproject</a>
          <span class="breadcrumb-item active">Manage Product</span>
        </nav>
  
        <div class="sl-pagebody">
           
          <div class="row row-sm">
            {{-- <div class="col-sm-6 col-xl-3">
               <div class="card p-5 mb-3">
                  <div class="card-header">Add Category</div>
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
                  <form method="post" action="{{url('add/category')}}" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                          <label for="categoryname" class="form-label">Category Name</label>
                          <input type="text" class="form-control" value="{{old('cat_name')}}" id="category_name"
                              name="category_name" placeholder="Enter Catregory Name">
                          @error('cat_name')
                          <span class="text-danger">{{$message}}</span>
                          @enderror

                      </div>
                      <div class="mb-3">
                          <label for="categorydescription" class="form-label">Category Description</label>
                          <textarea class="form-control" name="cat_des" id="categorydescription"
                              cols="4">{{old('cat_des')}}</textarea>

                          @error('cat_des')
                          <span class="text-danger">{{$message}}</span>
                          @enderror

                      </div>
                      {{-- <div class="mb-3">
                          <label for="categorydescription" class="form-label">Category Photo</label>
                          <input type="file" class="form-control" name="category_photo">

                          @error('cat_des')
            <span class="text-danger">{{$message}}</span>
                          @enderror

                      </div> --}}
                      {{-- <button type="submit" class="btn btn-primary">Add Catrgory</button>
                  </form>

              </div>

            </div> --}}
            <div class="col-sm-6 col-xl-12">
               
              @if (session('msg'))
              <div class="alert alert-success alert-dismissable fade show">
                <span>{{session('msg')}}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                  
              @endif
                  <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Active Product List</h6>
                    @if (session('msg'))
                    <span>{{session('msg')}}</span>
                        
                    @endif
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-15p">Image</th>
                            <th class="wd-15p">Product Name</th>
                            <th class="wd-20p">Product Quantity</th>
                            <th class="wd-20p">Category</th>
                            <th class="wd-20p">Brand</th>
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
                            @foreach ($products as $product)
                          <tr>
                            {{-- <td>Donna</td>
                            <td>Snider</td> --}}
                      
                                
                        
                            <td>
                              <img width="50px" height="50px" src="{{asset($product->image_one)}}" alt="not">
                            </td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->product_quantity}}</td>
                            <td>{{$product->Category->category_name}}</td>
                            <td>{{$product->brand->brand_name}}</td>
                            <td>
                            
                                @if ( $product->status==1)
                              
                                <span class="badge badge-success">Active</span>  
                                @else

                                    <span class="badge badge-success">Inactive</span>     
                                @endif  
                              
                            </td>
                            <td>
                              <a href="{{url('product/edit/'.$product->id)}}" class="btn-sm btn-info"><i class="fa fa-pencil"></i></a>|<a href="{{url('product/delete/'.$product->id)}}" onclick="return confirm('Are You Sure To Delete?')" class="btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                           
                              @if ( $product->status==1)
                              <a href="{{url('product/inactive/'.$product->id)}}" class="btn-sm btn-warning"><i class="fa fa-arrow-down"></i></a>
                              @else
                              <a href="{{url('product/active/'.$product->id)}}" class="btn-sm btn-success"><i class="fa fa-arrow-up"></i></a>  
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