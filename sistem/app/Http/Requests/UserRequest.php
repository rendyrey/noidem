<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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

            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required',
            
        ];
    }

    public function messages()
    {
        return [

            'name.required' => 'Kolom Nama harus diisi',
            'email.required' => 'Kolom Email harus diisi',
            'password.required' => 'Kolom Password harus diisi',
            'email.email' => 'Format Email salah'

        ];
    }
}
