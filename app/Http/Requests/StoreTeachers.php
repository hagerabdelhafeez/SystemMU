<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeachers extends FormRequest
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
            'teacher_name' => 'required|unique:teachers,teacher_name,'.$this->id,
            'email' => 'required|email|unique:teachers,email,'.$this->id,
            'mobile_number' => 'required|numeric|min:10',
            'Address' => 'required',
            'password' => 'required|string',
        ];
    }
}
