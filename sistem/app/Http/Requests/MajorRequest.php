<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MajorRequest extends Request
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

        'kode_major' => 'required',
        'major' => 'required'
            
        ];
    }

    public function messages()
    {

        return [

        'major.required' => 'Kolom Major tidak boleh kosong',
        'kode_major.required' => 'Kolom Kode Major tidak boleh kosong'
            
        ];

    }
}
