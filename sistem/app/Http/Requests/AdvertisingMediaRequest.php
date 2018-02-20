<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdvertisingMediaRequest extends Request
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

            'id_kategori' => 'required',
            'media' => 'required' 
            
        ];
    }

    public function messages()
    {
        return [

            'id_kategori.required' => 'Kolom Kategori tidak boleh kosong!',
            'media.required' => 'Kolom Media tidak boleh kosong!' 

        ];
    }
}
