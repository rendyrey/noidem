<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdvertisingCategoryRequest extends Request
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
            
            'kategori' => 'required'
        ];
    }

    public function messages()
    {
        return [

            'kategori.required' => 'Kolom Kategori tidak boleh kosong'

        ];
    }
}
