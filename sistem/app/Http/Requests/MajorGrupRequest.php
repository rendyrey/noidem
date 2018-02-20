<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MajorGrupRequest extends Request
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

        'kode' => 'required',
        'nama_grup' => 'required'
            
        ];
    }

    public function messages()
    {
        return [

        'kode.required' => 'Kolom Kode tidak boleh kosong',
        'nama_grup.required' => 'Kolom Nama Grup tidak boleh kosong'

        ];
    }
}
