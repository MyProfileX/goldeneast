@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>

            <div class="card-body">
               @if (session('status'))
                  <div class="alert alert-success" role="alert">
                     {{ session('status') }}
                  </div>
               @endif
                  
               <div class="d-flex justify-content-between align-items-center">
                  <div>{{ __('You are logged in as User!') }}</div>
                  <div><a href={{ route('user.main_page.dish.index') }} class="btn btn-secondary">Enter shop</a></div>
               </div>
            </div> 
                
         </div>
      </div>
   </div>
</div>
@endsection
