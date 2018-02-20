<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TingkatPendidikanRequest extends Request
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

            'tingkat' => 'required',
            'no_urut' => 'numeric|required'

        ];
    }

    public function messages()
    {
        return [

            'tingkat.required' => 'Kolom Tingkat tidak boleh kosong!',
            'no_urut.required' => 'Kolom No urut tidak boleh kosong',
            'no_urut.numeric' => 'Kolom No urut harus diisi dengan angka'

        ];
    }
}
