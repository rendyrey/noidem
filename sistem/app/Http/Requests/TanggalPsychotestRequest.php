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
            
            'tanggal_psychotest' => 'required|after:yesterday',
            
            'id_kota' => 'required',
            'kuota' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [

            'tanggal_psychotest.required' => 'Tanggal tidak boleh kosong!',
            'tanggal_psychotest.after' => 'Tanggal Psychotest harus hari ini atau di atasnya',
            'id_kota.required' => 'Kota tidak boleh kosong!',
            'kuota.required' => 'Kuota tidak boleh kosong!',
            'keterangan' => 'Keterangan tidka boleh kosong!',
            'kuota.numeric' => 'Kuota harus menggunakan angka!'

        ];
    }
}
