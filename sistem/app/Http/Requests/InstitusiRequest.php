<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class InstitusiRequest extends Request
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

        'nama_institusi' => 'required',
        'singkatan' => 'required'
            
        ];
    }

    public function messages()
    {
        return [
            'nama_institusi.required' => 'Kolom Nama Institusi harus diisi',
            'singkatan.required' => 'Kolom Singkatan harus diisi'
        ];
    }
}
