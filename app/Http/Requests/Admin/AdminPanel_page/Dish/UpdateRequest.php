<?php

namespace App\Http\Requests\Admin\AdminPanel_page\Dish;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
      return [
         'title' => 'required|string',
         'price'=>'required|numeric',
         'description'=>'required|string',
         'image' =>'mimes:jpeg,jpg,png', // здесь убираем параметр required, чтобы при изменении не было обязательно вставлять занаво файл,
                                         // (поскольку, в отличии от других полей, в input type="file", информация от $dish не удерживается)
                                         // Отсутствие араметра required позволит оставить поле не заполненным. В таком случае,  
                                       //   при обновлении, у нас останется старая картинка. 
         'country_id' => 'required|exists:countries,id',
         'vegetarian_id' => 'required|exists:vegetarians,id',
         'ingredients' => 'required|exists:ingredients,id',
        ];
    }
}
