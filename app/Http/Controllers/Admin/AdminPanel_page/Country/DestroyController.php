<?php

namespace App\Http\Controllers\Admin\AdminPanel_page\Country;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
   public function __invoke(Country $country)
   {
      $country->delete();
      return redirect()->route('admin.adminPanel_page.country.index');
   }
}
