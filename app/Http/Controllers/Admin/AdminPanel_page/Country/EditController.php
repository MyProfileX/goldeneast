<?php

namespace App\Http\Controllers\Admin\AdminPanel_page\Country;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class EditController extends Controller
{
   public function __invoke(Country $country)
   {
      $country = Country::find($country->id);

      return view('admin.adminPanel_page.country.edit', compact('country'));
   }
}
