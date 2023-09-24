<?php

namespace App\Http\Controllers\Admin\AdminPanel_page\Country;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CreateController extends Controller
{
   public function __invoke()
   {
      $countries = Country::all();

      return view('admin.adminPanel_page.country.create', compact('countries'));
   }


}
