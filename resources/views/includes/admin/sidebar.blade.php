{{-- Вырезанное меню сайдбара --}}

<nav class="mt-2">
   <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
     
     <li class="nav-header">ADMINISTRATOR CONTROLS</li>

   
     {{-- 
         $dishes      \
         $ingredients | AdminPanelPageController 
         $countries   / 
      --}}


      {{-- DISHES --}}
    <li class="nav-item">
      <a href="{{route('admin.adminPanel_page.dish.index')}}" class="nav-link">
        <i class="nav-icon fas fa-align-justify"></i>
        {{-- <i class="fa-solid fa-pot-food"></i> --}}
        
        <p style="color: #C2C7D0">
          Dishes
          <span class="badge badge-info right">{{ $dishes->count() }}</span>
        </p>
      </a>
    </li>

     {{-- INGREDIENTS --}}
     <li class="nav-item">
       <a href="{{route('admin.adminPanel_page.ingredient.index')}}" class="nav-link">
         <i class="nav-icon fas fa-align-justify"></i>
         <p style="color: #C2C7D0">
           Ingredients
            <span class="badge badge-info right">{{ $ingredients->count() }}</span> {{-- $ingredients - AdminPanelPageController --}}
         </p>
       </a>
     </li>

     {{-- COUNTRIES --}}
     <li class="nav-item">
      <a href="{{route('admin.adminPanel_page.country.index')}}" class="nav-link">
        <i class="nav-icon fas fa-align-justify"></i>
        <p style="color: #C2C7D0">
          Cultures
          <span class="badge badge-info right">{{ $countries->count() }}</span>
        </p>
      </a>
    </li>

    
     
     
   </ul>
 </nav>