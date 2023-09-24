<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
   <div id="app">
      <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm mb-3">
         <div class="container">
               {{-- <a class="navbar-brand" href="{{ url('/') }}">
                  {{ config('app.name', 'Laravel') }}
               </a> --}}
               <img class="navbar-brand" src="{{asset('img/logo.png')}}" height="46">
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                  <span class="navbar-toggler-icon"></span>
               </button>

               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <!-- Left Side Of Navbar -->
                  <ul class="navbar-nav me-auto">

                  </ul>
                  
                  {{-- <div class="content-container"><div> --}}
                     
                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ms-auto">
                     <!-- Authentication Links -->
                     @guest
                           @if (Route::has('login'))
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                              </li>
                           @endif

                           @if (Route::has('register'))
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                              </li>
                           @endif
                     @else
                        
                        {{-- User --}}
                        @can('userNav')
                        <li class="nav-item"><a href={{ route('user.main_page.dish.index') }} class="nav-link">Main(U)</a></li>
                        <li class="nav-item"><a href={{ route('user.catalog_page.dish.index') }} class="nav-link">Catalog</a></li>


                        {{-- Dropdown-menu START --}}

                        <div class="row">
                           <div class="col-lg-12 col-sm-12 col-12">
                              <a href="{{ route('user.cart_page.dish.index') }}" class="nav-link">Cart <span class="badge">{{ count((array) session('cart')) }}</span> </a>
                           </div>
                        </div>

                        {{-- Dropdown-menu END --}}
                        
                        @endcan

                        {{-- Admin --}}
                        @can('adminNav')
                        <li class="nav-item"><a href={{ route('admin.main_page.dish.index') }} class="nav-link">Main(A)</a></li>
                        {{-- <li class="nav-item"><a href={{ route('admin.catalog_page.dish.index') }} class="nav-link">Catalog(A)</a></li> --}}
                        <li class="nav-item"><a href={{ route('admin.adminPanel_page.dish.index') }} class="nav-link">Admin</a></li>
                        @endcan

                        <li class="nav-item dropdown">
                           <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->name }}
                           </a>

                           <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                              </form>
                           </div>
                        </li>

                     @endguest
                  </ul>
               </div>
         </div>
      </nav>


      <div class="content-container">
         @if (session('success'))
            @include('includes.alert')
         @endif
      </div>
      

      @yield('content')
      
   </div>

   @yield('scripts')
</body>
</html>
