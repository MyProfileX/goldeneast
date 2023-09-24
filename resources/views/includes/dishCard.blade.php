@vite(['resources/sass/app.scss', 'resources/js/app.js'])


   <div class="dish-card">

      <div class="dish-card_image-box">
         <img src="{{$dish->path}}" alt="dish-image" width="180" height="180">
      </div>
      <div class="dish-card_content-box">
         <p class="dish-card_title title">{{$dish->title}}</p>
         {{-- <div class="dish-card_description description"><p>{{$dish->ingredients->name}}</p></div> --}}
         
         <p class="dish-card_ingredients">
            @foreach ($dish->ingredients as $ingredient)
            
            @if (!$loop->last)
               {{$ingredient->name . ', '}}
            @else
               {{$ingredient->name . ';'}}
            @endif
          
         @endforeach
         </p>

         <p class="dish-card_price price">{{$dish->price}}₽</p>

         @can('userDishCard')
         <p class="dish-card_add-to-cart">
            {{-- <a href="{{ route('cart.dish.add.index', $dish) }}">Add to cart</a> --}}
            <a href="{{ route('cart.dish.add.index', $dish) }}">Add to cart</a>
            {{-- <a href="">Add to cart</a> --}}
         </p>
         @endcan

      </div> 
   </div


