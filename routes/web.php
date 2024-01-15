<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\AdminPanel_page\AdminPanelController;
use App\Http\Controllers\User\Cart_page\Stripe\StripeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes(['verify' => true]); // появляется при установке пакета авторизации


Route::get('/',  function(){
   return redirect()->route('login');
});

// Route::get('/', function() {
//    return view('welcome');
// });

Route::get('/admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home')
->middleware('isAdmin');

Route::get('/user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home')
->middleware('isUser');

// ADMIN ROUTES===========================================================


// Admin Panel page
Route::group(['namespace'=>'App\Http\Controllers\Admin\AdminPanel_page', 'prefix' => 'admin/admin_panel_page'], function(){

   // AdminPanel_page
    Route::get('/', AdminPanelController::class)->name('admin.admin_panel_page');

   // Country page
    Route::group(['namespace' => 'Country'], function(){

        Route::get('/countries', [App\Http\Controllers\Admin\AdminPanel_page\CountryController::class, 'index'])->name('admin.adminPanel_page.country.index');
        Route::get('/countries/create', [App\Http\Controllers\Admin\AdminPanel_page\CountryController::class, 'create'])->name('admin.adminPanel_page.country.create');
        Route::post('/countries', [App\Http\Controllers\Admin\AdminPanel_page\CountryController::class, 'store'])->name('admin.adminPanel_page.country.store');
        Route::get('/countries/{country}/edit', [App\Http\Controllers\Admin\AdminPanel_page\CountryController::class, 'edit'])->name('admin.adminPanel_page.country.edit');
        Route::patch('/countries/{country}', [App\Http\Controllers\Admin\AdminPanel_page\CountryController::class, 'update'])->name('admin.adminPanel_page.country.update');
        Route::delete('/countries/{country}', [App\Http\Controllers\Admin\AdminPanel_page\CountryController::class, 'destroy'])->name('admin.adminPanel_page.country.destroy');

   });

   // Ingredient page
    Route::group(['namespace' => 'Ingredient'], function(){

        Route::get('/ingredients', [App\Http\Controllers\Admin\AdminPanel_page\IngredientController::class, 'index'])->name('admin.adminPanel_page.ingredient.index');
        Route::get('/ingredients/create', [App\Http\Controllers\Admin\AdminPanel_page\IngredientController::class, 'create'])->name('admin.adminPanel_page.ingredient.create');
        Route::post('/ingredients', [App\Http\Controllers\Admin\AdminPanel_page\IngredientController::class, 'store'])->name('admin.adminPanel_page.ingredient.store');
        Route::get('/ingredients/{ingredient}/edit', [App\Http\Controllers\Admin\AdminPanel_page\IngredientController::class, 'edit'])->name('admin.adminPanel_page.ingredient.edit');
        Route::patch('/ingredients/{ingredient}', [App\Http\Controllers\Admin\AdminPanel_page\IngredientController::class, 'update'])->name('admin.adminPanel_page.ingredient.update');
        Route::delete('/ingredients/{ingredient}', [App\Http\Controllers\Admin\AdminPanel_page\IngredientController::class, 'destroy'])->name('admin.adminPanel_page.ingredient.destroy');

   });

    // Dish page
    Route::group(['namespace' => 'Dish'], function(){

        Route::get('/dishes', [App\Http\Controllers\Admin\AdminPanel_page\DishController::class, 'index'])->name('admin.adminPanel_page.dish.index');
        Route::get('/dishes/create', [App\Http\Controllers\Admin\AdminPanel_page\DishController::class, 'create'])->name('admin.adminPanel_page.dish.create');
        Route::post('/dishes', [App\Http\Controllers\Admin\AdminPanel_page\DishController::class, 'store'])->name('admin.adminPanel_page.dish.store');
        Route::get('/dishes/{dish}/edit', [App\Http\Controllers\Admin\AdminPanel_page\DishController::class, 'edit'])->name('admin.adminPanel_page.dish.edit');
        Route::patch('/dishes/{dish}', [App\Http\Controllers\Admin\AdminPanel_page\DishController::class, 'update'])->name('admin.adminPanel_page.dish.update');
        Route::delete('/dishes/{dish}', [App\Http\Controllers\Admin\AdminPanel_page\DishController::class, 'destroy'])->name('admin.adminPanel_page.dish.destroy');

   });
   
});






// USER ROUTES===========================================================

// Main page
Route::group(['namespace'=>'App\Http\Controllers\User\Main_page', 'prefix'=>'user/main_page'], function(){

    //Dish
    Route::group(['namespace'=>'Dish'], function(){

        Route::get('/dishes', App\Http\Controllers\User\Main_page\Dish\IndexController::class)->name('user.main_page.dish.index');
        Route::get('/dishes/{dish}', App\Http\Controllers\User\Main_page\Dish\ShowController::class)->name('user.main_page.dish.show');

   });
});


// Catalog page
Route::group(['namespace'=>'App\Http\Controllers\User\Catalog_page', 'prefix'=>'user/catalog_page'], function(){

    //Dish
    Route::group(['namespace'=>'Dish'], function(){

        Route::get('/dishes', App\Http\Controllers\User\Catalog_page\Dish\IndexController::class)->name('user.catalog_page.dish.index');

        // Поиск
        Route::get('/dishes/search', App\Http\Controllers\User\Catalog_page\Dish\SearchController::class)->name('user.catalog_page.dish.search');


        Route::get('/dishes/{dish}', App\Http\Controllers\User\Catalog_page\Dish\ShowController::class)->name('user.catalog_page.dish.show');

        // Dish   -> Cart
        Route::group(['namespace'=>'Cart'], function(){

            // Добавление в корзину index
            Route::get('/dishes/catalog/cart/add-to-cart/{dish}', [App\Http\Controllers\User\Catalog_page\Dish\Cart\AddController::class, 'index'])->name('cart.dish.add.index');

            // Добавление в корзину show
            Route::get('/dishes/show/cart/add-to-cart/{dish}', [App\Http\Controllers\User\Catalog_page\Dish\Cart\AddController::class, 'show'])->name('cart.dish.add.show');

        });

   });
});



// Cart page
Route::group(['namespace'=>'App\Http\Controllers\User\Cart_page', 'prefix'=>'user/cart_page'], function(){
   
    //Dish
    Route::group(['namespace'=>'Dish'], function(){

        // Список добавленного в корзину
        Route::get('/dishes/cart', App\Http\Controllers\User\Cart_page\Dish\IndexController::class)->name('user.cart_page.dish.index');
        
        // Обновление корзины (счёчик quantity)
        Route::patch('/dishes/cart/update-cart', App\Http\Controllers\User\Cart_page\Dish\UpdateController::class)->name('user.cart_page.dish.update');
        
        // Удаление из корзины
        Route::delete('/dishes/cart/remove-from-cart', App\Http\Controllers\User\Cart_page\Dish\RemoveController::class)->name('user.cart_page.dish.remove');

        // stripe
        Route::post('/session', [StripeController::class, 'session']) -> name('stripe_session');
        Route::get('/success', [StripeController::class, 'success'])->name('paySuccess');
        Route::get('/cancel', [StripeController::class, 'cancel'])->name('payCancel');

      
    });


});



