@vite(['resources/sass/app.scss', 'resources/js/app.js'])


   <div class="dish-show-card">
      <div class="dish-show-card_image-box">
         <img class="dish-show-image" src="{{$dish->path}}" alt="dish-image" width="230" height="230">
      </div>
      <div class="dish-show-card_content-box">
         <p class="dish-show-card_title title"><span class="feature-title">Title:</span> {{$dish->title}}</p>

         <p><span class="feature-title">Decsription:</span></p>
         <p>{{$dish->description}}</p>
         <p><span class="feature-title">Price:</span> {{$dish->price}}₽</p>

         <p><span class="feature-title">Culture:</span> {{$dish->country->name}}</p>
         <p><span class="feature-title">Type:</span> {{$dish->vegetarian->is_vegetarian}}</p>
         <p class="dish-show-card_ingredients"><span class="feature-title">Ingredients:</span> 

            @foreach ($dish->ingredients as $ingredient)
            
               @if (!$loop->last)
                  {{$ingredient->name . ', '}}
               @else
                  {{$ingredient->name . ';'}}
               @endif
             
            @endforeach
         </p>

      
      </div> 
   </div>
   


