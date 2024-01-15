<?php

namespace App\Http\Controllers\Admin\AdminPanel_page;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminPanel_page\Dish\StoreRequest;
use App\Http\Requests\Admin\AdminPanel_page\Dish\UpdateRequest;
use App\Models\Country;
use App\Models\Dish;
use App\Models\Ingredient;
use App\Models\Vegetarian;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index(){
        $dishes = Dish::orderBy('id', 'desc')->get();
        $countries = Country::all();
        $ingredients = Ingredient::all();
  
        return view('admin.adminPanel_page.dish.index', compact('countries', 'ingredients', 'dishes'));
    }

    public function create(){
        $dishes = Dish::all();

     
     $countries = Country::all();
     $types = Vegetarian::all();
     $ingredients = Ingredient::all();


     return view('admin.adminPanel_page.dish.create', compact('countries', 'types', 'ingredients', 'dishes'));
    }

    public function store(StoreRequest $request){
        $data = $request->validated();

      $ingredients = $data['ingredients'];
      unset($data['ingredients']);

      $dish = Dish::create($data); 
      $dish->ingredients()->sync($ingredients);

      // Checking if request has file and this file is valid
      if ($request->hasFile('image') && $request->file('image')->isValid()) {
         // Retrieving file drom request
         $file = $request->file('image');
         // Generating a new file name as file extension concatenated to current time (for uniqueness) 
         $imageName = time() . '.' . $file->getClientOriginalExtension();
         // moving file to public/images directory with new name
         $file->move(public_path('/img/dishes/'), $imageName);
         // making a fath foe db
         $dish->path = '/img/dishes/' . $imageName;
      }
      // Saving
      $dish->save();
      
      return redirect()->route('admin.adminPanel_page.dish.index');
    }

    public function show(){
        
    }

    public function edit(Dish $dish, Ingredient $ingredient){
        $dish = Dish::find($dish->id); // записываем id текущей записи в $dish, чтобы использовать её edit.blade
     $ingredient = Dish::find($ingredient->id); // записываем id текущей записи в $ingredient, чтобы использовать её edit.blade

     $ingredients = Ingredient::all();
     $countries = Country::all();
     $types = Vegetarian::all();
     
   //   dd(44444);
     return view('admin.adminPanel_page.dish.edit', compact( 'dish', 'ingredient', 'countries', 'types', 'ingredients' ));
    }

    public function update(UpdateRequest $request, Dish $dish){
        $data = $request->validated();

      $ingredients = $data['ingredients'];
      unset($data['ingredients']);


      $dish->update($data); 
      $dish->ingredients()->sync($ingredients);

      

   // Checking if request has file and this file is valid
      if ($request->hasFile('image') && $request->file('image')->isValid()) {
         // Retrieving file drom request
         $file = $request->file('image');
         // Generating a new file name as file extension concatenated to current time (for uniqueness) 
         $imageName = time() . '.' . $file->getClientOriginalExtension();
         // moving file to public/images directory with new name
         $file->move(public_path('/img/dishes/'), $imageName);
         // making a fath foe db
         $dish->path = '/img/dishes/' . $imageName;
      }
      // Saving
      $dish->save();

      
      return redirect()->route('admin.adminPanel_page.dish.index', $dish->id);
    }

    public function destroy(Dish $dish){
        $dish->delete();
        return redirect()->route('admin.adminPanel_page.dish.index');
    }
}
