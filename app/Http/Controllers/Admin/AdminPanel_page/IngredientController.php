<?php

namespace App\Http\Controllers\Admin\AdminPanel_page;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminPanel_page\Ingredient\StoreRequest;
use App\Http\Requests\Admin\AdminPanel_page\Ingredient\UpdateRequest;
use App\Models\Country;
use App\Models\Dish;
use App\Models\Gluten;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index(){
        $dishes = Dish::all();
        $countries = Country::all();
        $ingredients = Ingredient::orderBy('name', 'asc')->get();
  
        return view('admin.adminPanel_page.ingredient.index', compact('ingredients', 'countries', 'dishes'));
    }

    public function create(){
        $types = Gluten::all();

        return view('admin.adminPanel_page.ingredient.create', compact('types'));
    }

    public function store(StoreRequest $request){
        $data = $request->validated();
        Ingredient::create($data);

      return redirect()->route('admin.adminPanel_page.ingredient.index');
    }

    public function show(){
        
    }

    public function edit(Ingredient $ingredient){
        $ingredient = Ingredient::find($ingredient->id); // uses in edit.blade
      
        $types = Gluten::all();
   

     return view('admin.adminPanel_page.ingredient.edit', compact('ingredient', 'types'));
    }

    public function update(UpdateRequest $request, Ingredient $ingredient){
        $data = $request->validated();

        $ingredient->update($data);

     return redirect()->route('admin.adminPanel_page.ingredient.index');
    }

    public function destroy(Ingredient $ingredient){
        $ingredient->delete();
        return redirect()->route('admin.adminPanel_page.ingredient.index');
    }
}
