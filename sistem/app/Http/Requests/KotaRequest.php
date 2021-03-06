<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class KotaRequest extends Request
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

        'kota'  => 'required',
        'id_provinsi' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'kota.required' => 'Kolom Kota harus diisi',
            'id_provinsi.required' => 'Kolom Provinsi harus diisi'
        ];
    }
}
