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
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="email" class="form-control" value="{{Auth::user()->name}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    
                      </div>
                     
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" class="form-control"  value="{{Auth::user()->email}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  
                    </div>
                   
                  
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
