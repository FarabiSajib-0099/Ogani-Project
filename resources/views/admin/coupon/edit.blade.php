@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Miniproject</a>
          <span class="breadcrumb-item active">Edit Coupon</span>
        </nav>
  
        <div class="sl-pagebody">
           
          <div class="row row-sm">
            <div class="col-sm-6 col-xl-6 m-auto">
               <div class="card p-2 mb-3">
                  <div class="card-header">Edit Coupon</div>
                  @if ($errors->all())
                  <div class="alert alert-danger">
                      @foreach ($errors->all() as $error)
                      <li>{{$error}} </li>

                      @endforeach

                  </div>

                  @endif

                  @if (session('msg'))
                  <div class="aler alert-success">{{session('msg')}}</div>

                  @endif
                  <form method="post" action="{{route('update.coupon')}}" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                        <input type="hidden" value="{{$coupon->id}}" name="coupon_id">
                          <label for="coupon_name" class="form-label">Coupon Name</label>
                          <input type="text" class="form-control"  id="brand_name"
                              name="coupon_name" value="{{$coupon->coupon_name}}">
                          @error('coupon_name')
                          <span class="text-danger">{{$message}}</span>
                          @enderror

                      </div>

                      <div class="mb-3">
                        <input type="hidden" value="{{$coupon->id}}" name="coupon_id">
                          <label for="discount" class="form-label">Coupon Discount</label>
                          <input type="text" class="form-control"  id="discount"
                              name="discount" value="{{$coupon->discount}}">
                          @error('discount')
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
                      <button type="submit" class="btn btn-primary">Update Coupon</button>
                  </form>

              </div>

            </div>
          
          </div><!-- row -->
  
        
  
        </div><!-- sl-pagebody -->
        
      </div><!-- sl-mainpanel -->
      <!-- ########## END: MAIN PANEL ########## -->
@endsection