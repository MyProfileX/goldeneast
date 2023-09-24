@include('includes.vendor')
@extends('admin.adminPanel_page.adminPanel')

@section('Admin_Panel_Content')

   <div class="container">

      <a class="btn btn-primary" href={{route('admin.adminPanel_page.ingredient.create')}}>New ingredient</a>

      <table class="table table-hover">
         <thead>
         <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">price_for_gram</th>
            <th scope="col">gluten_id</th>
            <th scope="col">edit / delete</th>
         </tr>
         </thead>
         <tbody>
            @foreach ($ingredients as $ingredient)
            <tr>
               <th>{{$ingredient->id}}</th>
               <td>{{$ingredient->name}}</td>
               <td>{{$ingredient->price_for_gram}}</td>
               <td>{{$ingredient->gluten_id}}</td>

               <td>
                  {{-- обновление --}}
                  
                  <div class="action-col">
                     <div>
                        <a class="btn btn-primary"  href={{route('admin.adminPanel_page.ingredient.edit', $ingredient)}}>Edit</a>
                     </div>

                     <div>
                        <form action={{route('admin.adminPanel_page.ingredient.destroy', $ingredient)}} method="post">
                           @csrf
                           @method('delete')
                           <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                     </div>
                  </div>

               </td>
               
            </tr>
            @endforeach
         
         </tbody>
      </table>

   </div>

@endsection


