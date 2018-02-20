<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AkreditasiRequest extends Request
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

            'id_institusi' => 'required',
            'id_major'  => 'required',
            'id_tingkat_pendidikan' => 'required'

        ];
    }

    public function messages()
    {
        return [

            'id_institusi.required' => 'Institusi tidak boleh kosong',
            'id_major.required' => 'Major tidak boleh kosong',
            'id_tingkat_pendidikan.required' => 'Tingkat Pendidikan tidak boleh kosong'

        ];
    }
}
