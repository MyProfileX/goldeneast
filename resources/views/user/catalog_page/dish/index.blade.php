@include('includes.vendor')
@extends('layouts.header')
@section('content')

<div class="container">

   <div class="content-container">
      
      <form class="form-inline mb-3 searchbar">
         <input type="text" name="search" id="search" placeholder="Search a dish" class="form-control" autocomplete="off" >
      </form>

      <div class="dish-list-box">
         @foreach ($dishes as $dish)
            <a href="{{route('user.catalog_page.dish.show', $dish)}}" >
               @include('includes.dishCard')
            </a>    
         @endforeach
      </div>
   </div>

</div>

@endsection


@section('scripts')
<script type="text/javascript">


$(document).on('keyup',  function(e){
      e.preventDefault();
      let query = $('#search').val();

       
      
      console.log(query);
      
      $.ajax({
         url: "{{ route('user.catalog_page.dish.search') }}",
         method: 'get',
         data:{
            query:query
         },
         success:function(res){
            
            // console.log(res);
            // То, КУДА мы рендерим
            // console.log('Success!!!!')
            $('.dish-list-box').html(res);
            // $('.dish-card').html(res);
         },
         error: function(xhr, status, error) {
          console.log('AJAX CUSTOM ERROR RESPONSE')
          console.log(xhr.responseText);
          console.log(status);
          console.log(error);
        }
      })
});


</script>
@endsection

