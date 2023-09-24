<?php

namespace App\Http\Controllers\Admin\AdminPanel_page\Country;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminPanel_page\Country\UpdateRequest;
use App\Models\Country;

use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
   public function __invoke(UpdateRequest $request, Country $country)
   {
      $data = $request->validated();

      $country->update($data);

      return redirect()->route('admin.adminPanel_page.country.index');

   }
}
