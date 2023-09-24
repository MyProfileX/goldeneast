@include('includes.vendor')
@extends('admin.adminPanel_page.adminPanel')

@section('Admin_Panel_Content')

   <div class="container">
      
      {{-- <div>   
         <a href="{{route('admin.admin_panel_page')}}">
            <img src="{{asset('img/back.png')}}" alt="back" height="22">
         </a>
      </div> --}}
      
      


      <a class="btn btn-primary" href="{{route('admin.adminPanel_page.dish.create')}}">New dish</a>



      <table class="table table-hover">
         <thead>
         <tr>
            <th scope="col">id</th>
            <th scope="col">img</th>
            <th scope="col">name</th>
            <th scope="col">culture</th>
            <th scope="col">price</th>
            <th scope="col">type</th>
            <th scope="col">edit / delete</th>
         </tr>
         </thead>
         <tbody>
            @foreach ($dishes as $dish)
            
            <tr>
               <th>{{$dish->id}}</th>
               <td><img src="{{$dish->path}}" alt="dish-image" width="120" height="120"></td>
               <td>{{$dish->title}}</td>

               {{-- culture --}}
               <td>{{$dish->country->name}}</td>
               {{-- price --}}
               <td>{{$dish->price}}</td>
               {{-- type --}}
               <td>{{$dish->vegetarian->is_vegetarian}}</td>

               
               <td>

                  <div class="action-col">
                     <div>
                        <a class="btn btn-primary" href="{{route('admin.adminPanel_page.dish.edit', $dish->id)}}">Edit</a>
                     </div>

                     <form action="{{route('admin.adminPanel_page.dish.destroy', $dish->id)}}" method="post">
                        @csrf
                        @method('delete')
                           <input class="btn btn-danger" type="submit" value="Delete">
                     </form>
                  </div>

               </td>
            </tr>
            @endforeach

         
         </tbody>
      </table>

   </div>

@endsection

