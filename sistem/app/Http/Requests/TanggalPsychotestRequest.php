<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TanggalPsychotestRequest extends Request
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
            
            'tanggal_psychotest' => 'required',
            'id_iklan' => 'required',
            'id_kota' => 'required'
        ];
    }

    public function messages()
    {
        return [

            'tanggal_psychotest.required' => 'Tanggal tidak boleh kosong!',
            'id_iklan.required' => 'Iklan tidak boleh kosong!',
            'id_kota.required' => 'Kota tidak boleh kosong!'

        ];
    }
}
