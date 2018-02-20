<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BidangUsahaRequest extends Request
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

        'bidang_usaha' => 'required'
            
        ];
    }

    public function messages()
    {
        return [
            'bidang_usaha.required'  => 'Kolom Bidang Usaha harus diisi'
        ];
    }
}
