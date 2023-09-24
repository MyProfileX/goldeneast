@include('includes.vendor')

<div class="wrapper">
   <div class="container">
      <form method="post" action="{{ route('admin.adminPanel_page.dish.store') }}" enctype="multipart/form-data">
         @csrf

         <div>
            <a href="{{route('admin.adminPanel_page.dish.index')}}">
               <img src="{{asset('img/back.png')}}" alt="back" height="22">
            </a>
         </div>

         <p>create dish</p>

         <div>
            <label for="title">Title</label>
            <input value="{{old('title')}}" name="title" id="title" type="text" class="form-control" >

            @error('title')
               <p class="text-danger">{{$message}}</p>
            @enderror
         </div>

         <div>
            <label for="price">Price</label>
            <input value="{{old('price')}}" name="price" id="price" type="text" class="form-control" >

            @error('price')
               <p class="text-danger">{{$message}}</p>
            @enderror
         </div>

         <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{old('description')}}</textarea>

            @error('description')
               <p class="text-danger">{{$message}}</p>
            @enderror
         </div>

         <div>
            <label for="image">Image</label>
            <input value="{{old('image')}}" name="image" id="image" type="file" class="form-control">

            @error('image')
               <p class="text-danger">{{$message}}</p>
            @enderror
         </div>

         <div>
            <label for="country">Culture</label>
            <select name="country_id" id="country" class="form-control">
               @foreach ($countries as $country)
                  <option {{old('country_id') == $country->id ? 'selected' : ''}}
                   value="{{$country->id}}">{{$country->name}}</option>
               @endforeach
            </select>
         </div>

         <div>
            <label for="ingredients">Ingredients</label>
            <select multiple name="ingredients[]" id="ingredients" class="form-control">
            
            @foreach ($ingredients as $ingredient)
               <option {{in_array($ingredient->id, old('ingredients', [])) ? 'selected' : '' }}
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
               <option {{old('vegetarian_id') == $type->id ? 'selected' : ''}}
               value="{{$type->id}}">{{$type->is_vegetarian}}</option>
            @endforeach
            </select>
         </div>
         

         <button type="submit" class="btn btn-success">Store</button>

      </form>
   </div>
</div>

