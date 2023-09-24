@include('includes.vendor')
{{-- @section('content') --}}

   <div class="container">
      <div class="content-container">
      {{-- User/catalog_page/dish/show --}}
      
         <div>
            <a href="{{route('user.catalog_page.dish.index')}}">
               <img src="{{asset('img/back.png')}}" alt="back" height="22">
            </a>
         </div>


         
         <div class="dishShowCard">
            @include('includes.dishShowCard')
         </div>
         


         <a href="{{ route('cart.dish.add.show', $dish) }}" class="dish-show-card_add-to-cart">
            <p>Add to cart</p>
         </a>

      </div>
   </div>

{{-- @endsection --}}