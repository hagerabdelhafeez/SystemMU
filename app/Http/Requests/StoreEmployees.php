<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployees extends FormRequest
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

            'employee_name' => 'required|unique:employees,employee_name,'.$this->id,
            'email' => 'required|email|unique:employees,email,'.$this->id,
            'mobile_number' => 'required|numeric|min:10',
            'Address' => 'required',
            'password' => 'required|string',
        ];
    }
}
