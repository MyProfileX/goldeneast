@include('includes.vendor')
@extends('admin.adminPanel_page.adminPanel')

@section('Admin_Panel_Content')

   <div class="container">
      
         
      <a class="btn btn-primary" href="{{route('admin.adminPanel_page.country.create')}}">New culture</a>



      <table class="table table-hover">
         <thead>
         <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">edit / delete</th>
         </tr>
         </thead>
         <tbody>
            @foreach ($countries as $country)
            <tr>
               <th>{{$country->id}}</th>
               <td>{{$country->name}}</td>


               <td>
                  <div class="action-col">
                     <div>      
                        <a class="btn btn-primary" href="{{route('admin.adminPanel_page.country.edit', $country)}}">Edit</a>
                     </div>

                     <form action="{{route('admin.adminPanel_page.country.destroy', $country)}}" method="post">
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

