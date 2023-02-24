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
            'mobile_number' => 'required|min:10|max:10',
            'Address' => 'required',
            'password' => 'required|string',
            'date_birth' => 'required|date',
            'degree' => 'required',
            'genders_id' => 'required',
            'blood_id' => 'required',
            'religons_id' => 'required',
            'nationalities_id' => 'required',
            'departments_id' => 'required',
            'course_id' => 'required',
        ];
    }
}
