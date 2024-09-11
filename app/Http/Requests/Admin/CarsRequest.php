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
            'category' => 'required',
            'sub_category' => 'required',
            'model' => 'required',
            'photo' => 'required|file|mimes:jpg,jpeg,svg,png|max:2048',
            'info' => 'nullable'
        ];
    }
}
