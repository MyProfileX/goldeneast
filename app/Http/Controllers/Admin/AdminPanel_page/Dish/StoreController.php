<?php

namespace App\Http\Controllers\Admin\AdminPanel_page\Dish;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminPanel_page\Dish\StoreRequest;
use App\Models\Dish;
use Illuminate\Http\Request;

class StoreController extends Controller
{
   public function __invoke(StoreRequest $request)
   {
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
}
