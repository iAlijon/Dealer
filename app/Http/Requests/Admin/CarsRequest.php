<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CarsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'model' => 'required',
            'price' => 'required',
            'color' => 'required',
            'photo' => 'required|file|mimes:jpg,jpeg,svg,png|max:2048',
            'info' => 'nullable'
        ];
    }
}
