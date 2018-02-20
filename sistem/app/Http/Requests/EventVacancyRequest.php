<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EventVacancyRequest extends Request
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

            'event_code' => 'required',
            'id_media' => 'required',
            'plan_start_date' => 'required',
            'plan_end_date' => 'required',
            'actual_start_date' => 'required',
            'actual_end_date' => 'required',
            'budget' => 'required',
            'cost' => 'required',
            'target_fresh' => 'required',
            'target_exp' => 'required',
            'target_fresh_call' => 'required',
            'target_exp_call' => 'required',
            'target_fresh_pass' => 'required',
            'target_exp_pass' => 'required',
            'is_active' => 'numeric|required',
            'domain' => 'required'
            
        ];
    }

    public function messages()
    {
        return [

            'event_code.required' => 'Kolom Event Code tidak boleh kosong!',
            'id_media.required' => 'Kolom Media tidak boleh kosong!',
            'plan_start_date.required' => 'Kolom Plan Start Date tidak boleh kosong!',
            'plan_end_date.required' => 'Kolom Plan End Date tidak boleh kosong!',
            'actual_start_date.required' => 'Kolom Actual Start Date tidak boleh kosong!',
            'actual_end_date.required' => 'Kolom Actual End Date tidak boleh kosong!',
            'budget.required' => 'Kolom Budget tidak boleh kosong!',
            'cost.required' => 'Kolom Cost tidak boleh kosong!',
            'target_fresh.required' => 'Kolom Target Fresh tidak boleh kosong!',
            'target_exp.required' => 'Kolom Target Exp tidak boleh kosong!',
            'target_fresh_call.required' => 'Kolom Target Fresh Call tidak boleh kosong!',
            'target_exp_call.required' => 'Kolom Target Exp Call tidak boleh kosong!',
            'target_fresh_pass.required' => 'Kolom Target Fresh Pass tidak boleh kosong!',
            'target_exp_pass.required' => 'Kolom Target Exp Pass tidak boleh kosong!',
            'is_active.required' => 'Kolom Is Active tidak boleh kosong!',
            'is_active.numeric' => 'Kolom Is Active harus diisi dengan angka!',
            'domain.required' => 'Kolom Domain tidak boleh kosong!',

        ];
    }
}
