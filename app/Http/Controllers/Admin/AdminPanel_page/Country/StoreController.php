<?php

namespace App\Http\Controllers\Admin\AdminPanel_page\Country;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminPanel_page\Country\StoreRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class StoreController extends Controller
{
   public function __invoke(StoreRequest $request)
   {
      $data = $request->validated();
      Country::create($data);
      // dd($data);
      return redirect()->route('admin.adminPanel_page.country.index');
   }
}
