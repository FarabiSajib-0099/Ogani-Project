@extends('admin.admin_layouts')
@section('category')
    active
@endsection
@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Miniproject</a>
          <span class="breadcrumb-item active">Category</span>
        </nav>
  
        <div class="sl-pagebody">
           
          <div class="row row-sm">
            <div class="col-sm-6 col-xl-3">
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
                      <button type="submit" class="btn btn-primary">Add Catrgory</button>
                  </form>

              </div>

            </div>
            <div class="col-sm-6 col-xl-9">
               
                @if (session('d_msg'))
                <div class="aler alert-danger">{{session('d_msg')}}</div>

                @endif
                  <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Active Category List</h6>
                    
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-15p">Serial</th>
                            <th class="wd-15p">Category Name</th>
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
                            @foreach ($categories as $category)
                          <tr>
                            {{-- <td>Donna</td>
                            <td>Snider</td> --}}
                      
                                
                        
                            <td>{{$i++}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>
                            
                                @if ( $category->status==1)
                              
                                <span class="badge badge-success">Active</span>  
                                @else

                                    <span class="badge badge-success">Inactive</span>     
                                @endif  
                              
                            </td>
                            <td>
                                <a href="{{url('category/edit/'.$category->id)}}" class="btn-sm btn-info">Edit</a>|<a href="{{url('category/delete/'.$category->id)}}" class="btn-sm btn-danger">Delete</a>
                                
                                @if ( $category->status==1)
                                <a href="{{url('category/inactive/'.$category->id)}}" class="btn-sm btn-warning">Inactive</a>
                                @else
                                <a href="{{url('category/active/'.$category->id)}}" class="btn-sm btn-success">Active</a>  
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