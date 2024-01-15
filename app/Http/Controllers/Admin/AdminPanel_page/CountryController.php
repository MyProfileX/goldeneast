<?php

namespace App\Http\Controllers\Admin\AdminPanel_page;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminPanel_page\Country\StoreRequest;
use App\Http\Requests\Admin\AdminPanel_page\Country\UpdateRequest;
use App\Models\Country;
use App\Models\Dish;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(){
        $dishes = Dish::all();
        $countries = Country::orderBy('name', 'asc')->get();
        $ingredients = Ingredient::all();
  
        return view('admin.adminPanel_page.country.index', compact('countries', 'ingredients', 'dishes'));
    }

    public function create(){
        $countries = Country::all();

        return view('admin.adminPanel_page.country.create', compact('countries'));
    }

    public function store(StoreRequest $request){
        $data = $request->validated();
        Country::create($data);
        // dd($data);
        return redirect()->route('admin.adminPanel_page.country.index');
    }


    public function show(){
        
    }



    public function edit(Country $country){
        $country = Country::find($country->id);

        return view('admin.adminPanel_page.country.edit', compact('country'));
    }

    public function update(UpdateRequest $request, Country $country){
        $data = $request->validated();

        $country->update($data);

        return redirect()->route('admin.adminPanel_page.country.index');
    }

    public function destroy(Country $country){
        $country->delete();
        return redirect()->route('admin.adminPanel_page.country.index');
    }
}
