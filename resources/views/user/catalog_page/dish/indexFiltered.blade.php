
{{-- то, что рендерится по поиску --}}
@foreach ($dishesFiltered as $dish)
   <a href="{{route('user.catalog_page.dish.show', $dish)}}" >
      @include('includes.dishCard')
   </a>    
@endforeach
