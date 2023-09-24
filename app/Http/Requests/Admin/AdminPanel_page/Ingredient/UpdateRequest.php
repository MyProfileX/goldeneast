<?php

namespace App\Http\Requests\Admin\AdminPanel_page\Ingredient;

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
         'name'=>'required|string',
         'price_for_gram'=>'required|numeric',
         'gluten_id'=>'required|exists:glutens,id',
        ];
    }
}
