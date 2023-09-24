@include('includes.vendor')


<div class="container">

   <div> 
      <a href="{{route('admin.adminPanel_page.ingredient.index')}}">
         <img src="{{asset('img/back.png')}}" alt="back" height="22">
      </a>
   </div>

   <p>create ingredient</p>

   <form action="{{route('admin.adminPanel_page.ingredient.store')}}" method="post">
   @csrf

      <div>
         <label for="name">name</label>
         <input value="{{old('name')}}" name="name" class="form-control" type="text">
         
         @error('name')
            <p class="text-danger">{{$message}}</p>
         @enderror
      </div>

      <div>
         <label for="price_for_gram">price for gram</label>
         <input value="{{old('price_for_gram')}}" name="price_for_gram" class="form-control" type="text">

         @error('price_for_gram')
            <p class="text-danger">{{$message}}</p>
         @enderror
      </div>

      <div>
         <label for="gluten">gluten</label>
         <select name="gluten_id" id="" class="form-control">
            @foreach ($types as $type)
               <option {{old('gluten_id') == $type->id ? 'selected' : ''}}
               value="{{$type->id}}">{{$type->is_gluten}}</option>
            @endforeach
         </select>
      </div>

      <button type="submit" class="btn btn-success">Store</button>

   </form>

</div>

