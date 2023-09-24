@include('includes.vendor')

<div class="container">

   <div>   
      <a href="{{route('admin.adminPanel_page.country.index')}}">
         <img src="{{asset('img/back.png')}}" alt="back" height="22">
      </a>
   </div>

   <p>edit country</p>


   <form action="{{route('admin.adminPanel_page.country.update', $country)}}" method="post">
      @csrf
      @method('patch')
      
         <div>
            <label for="name">name</label>
            <input value="{{$country->name}}" name="name" type="text" class="form-control">
   
            @error('name')
               <p class="text-danger">{{$message}}</p>
            @enderror
         </div>
   
         <button type="submit" class="btn btn-success">Update</button>
   
   </form>


</div>

