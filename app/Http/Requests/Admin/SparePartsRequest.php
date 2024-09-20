<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SparePartsRequest extends FormRequest
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
        $rules = [
          'photo' => 'required',
          'photo.*' => 'mimes:jpg,jpeg,png|max:2048'
        ];
        return [
            'name_uz' => 'required',
            'name_ru' => 'nullable',
            'name_en' => 'nullable',
            'photo' => $rules,
            'info' => 'nullable',
            'price' => 'required',
            'status' => 'required'
        ];
    }
}
