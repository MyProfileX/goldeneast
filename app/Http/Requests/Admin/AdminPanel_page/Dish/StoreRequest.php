<?php

namespace App\Http\Requests\Admin\AdminPanel_page\Dish;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
         'image' =>'required|mimes:jpeg,jpg,png',
         'country_id' => 'required|exists:countries,id',
         'vegetarian_id' => 'required|exists:vegetarians,id',
         'ingredients' => 'required|exists:ingredients,id',
        ];
    }
}
