
@include('includes.vendor')
@extends('layouts.header')


{{-- @include('includes.alert') --}}

@section('content')

<div class="container">

   <table class="table table-hover">
      {{-- HEAD --}}
      <thead>
        <tr>
          <th style="width:30%" scope="col">Dish</th>
          <th style="width:20%" scope="col">Price</th>
          <th style="width:10%" scope="col">Quantity</th>
          <th style="width:30%" class="text-center" scope="col">Subtotal</th>
          <th style="width:20%"></th>
        </tr>
      </thead>

      {{-- BODY --}}
      <tbody>
         @php $total = 0 @endphp

         {{-- для каждого id элемента в массиве $dishes, определяем соответствующий элемент массива (session('cart') --}}
         @foreach($dishes as $dish)
            @php $dish->id = (session('cart')) @endphp
         @endforeach

         @if(session('cart'))

            @foreach(session('cart') as $dish->id => $details)

               {{-- Total - собирает цена*кол-во с каждого $details в цикле (см. <tfoot>) --}}
               @php $total += $details['price'] * $details['quantity']  @endphp

               <tr class="cart-item" data-id="{{$dish->id}}">
                  
                  <td data-th="Dish">
                     <div class="row">
                        <div class="">
                           <img  src="{{ $details['photo'] }}" alt="" width="150" height="150"> {{--  "photo" - Catalog_page\Dish\Cart\AddController.php --}}
                        </div>
                        <div class="">{{ $details['title'] }}</div>
                     </div>
                  </td>

                  <td data-th="Price">{{ $details['price'] }} руб.</td>

                  <td data-th="Quantity">
                     <div>
                        <input class="form-control cart_update quantity" type="number" value="{{$details['quantity']}}" min="1" />
                     </div>
                  </td>

                  <td data-th="Subtotal" class="text-center"> {{ $details['price'] * $details['quantity'] }} руб.</td>
                  <td data-th="actions">
                     <button class="cart_remove btn btn-danger"><i class="da da-trash-o">Delete</i></button>
                  </td>
               </tr>

            @endforeach
         @endif
      </tbody>

      <tfoot>
         {{-- Total --}}
         <tr>
            <td colspan="5" style="text-align:right"><h3><strong>Total: {{$total}} ₽</strong></h3></td>
         </tr>

         {{-- Continue Shopping & Checkout --}}
         <tr>
            <td colspan="5" style="text-align:right">
               <form action="{{route('stripe_session')}}" method="post">
                  <a href="{{ route('user.catalog_page.dish.index') }}" class="btn btn-danger">
                     <i class="fa fa-arrow-left">Continue Shopping</i>
                  </a>
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <button class="btn btn-success" type="submit" id="checkout-live-button">
                     <i class="fa fa-money"></i>Checkout
                  </button>
               </form>
            </td>
         </tr>
      </tfoot>

    </table>
</div>
@endsection

@section('scripts')
<script type="text/javascript">

$(".cart_update").change(function(e){
      e.preventDefault();

      var ele =  $(this);


// if(confirm("Do you really want to update?")){
      $.ajax({
         url: '{{ route('user.cart_page.dish.update') }}',
         method: "PATCH",
         data: {
            _token: '{{ csrf_token() }}',
            id: ele.parents("tr").attr("data-id"),
            quantity: ele.parents("tr").find(".quantity").val()
         },
         success: function (response){
            window.location.reload();
         }
      })
// }
      
      
   })


   $(".cart_remove").click(function(e){
      e.preventDefault();

      var ele = $(this);

      if(confirm("Do you really want to remove?"))
      {
         $.ajax({
            url: '{{ route('user.cart_page.dish.remove') }}',
            method: "DELETE",
            data: {
               _token: '{{ csrf_token() }}',
               id: ele.parents("tr").attr("data-id")
            },
            success: function (response){
               window.location.reload();
            }
         })

      }
   })


   

</script>
@endsection