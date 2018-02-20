<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MenuUserRequest extends Request
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
            
            'id_induk' => 'numeric|required',
            'menu' => 'required',
            'icon' => 'required',
            'url' => 'required',
            'no_urut' => 'numeric|required'
        ];
    }

    public function messages()
    {
        return [

            'id_induk.required' => 'Kolom Induk harus dipilih',
            'id_induk.numeric' => 'Kolom Induk harus diisi dengan angka',
            'menu.required' => 'Kolom Menu tidak boleh kosong',
            'icon' => 'Kolom Icon tidak boleh kosong',
            'url.required' => 'Kolom URL tidak boleh kosong',
            'no_urut.required' => 'Kolom No Urut tidak boleh kosong',
            'no_urut.numeric' => 'Kolom No Urut harus diisi dengan angka' 

        ];
    }
}
