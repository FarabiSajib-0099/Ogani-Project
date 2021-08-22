<div class="card" style="width: 18rem;">
   <img class="card-img-top" src="..." alt="Card image cap">
   <div class="card-body">
     
   </div>
   <ul class="list-group list-group-flush">
    <a href="{{route('home')}}" class="btn-sm btn-primary btn-block">Home</a>

   
   
    <a href="{{route('user.order')}}" class="btn-sm btn-success btn-block">My Orders</a>
       <a class="btn-sm btn-warning btn-block" href="{{ route('admin.logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                           {{ __('Logout') }}
                       </a>

                       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                           @csrf
                       </form>
 
   </ul>
  
 </div>