<div class="hero__categories">
   <div class="hero__categories__all">
       <i class="fa fa-bars"></i>
       <span>All Categories</span>
   </div>
   @php
       $categrory=App\Category::where('status',1)->get();
   @endphp
   <ul>
       @foreach ($categrory as $categrory)
           
     
       <li><a href="{{url('category/product/show/'.$categrory->id)}}">{{$categrory->category_name}}</a></li>
       @endforeach
   </ul>
</div>