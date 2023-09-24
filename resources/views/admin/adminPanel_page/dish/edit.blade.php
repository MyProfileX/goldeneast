@include('includes.vendor')


<div class="wrapper">
   <div class="container">
      {{-- <form method="post" action="{{ route('admin.catalog_page.dish.update', $dish->id) }}" enctype="multipart/form-data"> --}}
      <form method="post" action="{{ route('admin.adminPanel_page.dish.update', $dish, $ingredient) }}" enctype="multipart/form-data">
         @csrf
         @method('patch')

         <div>
            <a href="{{route('admin.adminPanel_page.dish.index')}}">
               <img src="{{asset('img/back.png')}}" alt="back" height="22">
            </a>
         </div>

         <p>edit dish</p>

         <div>
            <label for="title">Title</label>
            <input value="{{ $dish->title }}" name="title" id="title" type="text" class="form-control" >

            @error('title')
               <p class="text-danger">{{$message}}</p>
            @enderror
         </div>

         <div>
            <label for="price">Price</label>
            <input value="{{ $dish->price }}" name="price" id="price" type="text" class="form-control" >

            @error('price')
               <p class="text-danger">{{$message}}</p>
            @enderror
         </div>

         <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $dish->description }}</textarea>

            @error('description')
               <p class="text-danger">{{$message}}</p>
            @enderror
         </div>


         {{-- не знаю, как удержать выбранный файл при провальной валидации других полей --}}
         <div>
            <label for="image">Image</label>
            <input value="{{ $dish->path }}" name="image" id="image" type="file" class="form-control"> 

            @error('image')
               <p class="text-danger">{{$message}}</p>
            @enderror
         </div>





         <div>
            <label for="country">Culture</label>
            <select name="country_id" id="country" class="form-control">
               @foreach ($countries as $country)
                  <option {{$country->id == $dish->country->id ? 'selected' : ''}}
                   value="{{$country->id}}">{{$country->name}}</option>
               @endforeach
            </select>
         </div>

         <div>
            <label for="ingredients">Ingredients</label>
            <select multiple name="ingredients[]" id="ingredients" class="form-control" autocomplete="off">
            
            @foreach ($ingredients as $ingredient)
               
            <option {{in_array($ingredient->id, $dish->ingredients->pluck('id')->toArray()) ? 'selected' : '' }}
               value="{{$ingredient->id}}">{{$ingredient->name}}</option>
            @endforeach

            </select>

            @error('ingredients')
               <p class="text-danger">{{$message}}</p>
            @enderror
         </div>

         <div>
            <label for="type">Type</label>
            <select name="vegetarian_id" id="type" class="form-control">
            @foreach ($types as $type)
               <option {{$type->id == $dish->vegetarian->id ? 'selected' : ''}}
               value="{{$type->id}}">{{$type->is_vegetarian}}</option>
            @endforeach
            </select>
         </div>
         

         <button type="submit" class="btn btn-success">Update</button>

      </form>
   </div>
</div>


