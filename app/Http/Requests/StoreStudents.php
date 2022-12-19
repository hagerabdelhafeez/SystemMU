<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudents extends FormRequest
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
            'student_name' => 'required|unique:students,student_name,'.$this->id,
            'email' => 'required|email|unique:teachers,email,'.$this->id,
            'mobile_number' => 'required|numeric|min:10',
            'Address' => 'required',
            'password' => 'required|string',
            'student_no' => 'required|string',
            'date_birth' => 'required|date',
            'genders_id' => 'required',
            'blood_id' => 'required',
            'religons_id' => 'required',
            'nationalities_id' => 'required',
            'colleges_id' => 'required',
            'departments_id' => 'required',
            'class_id' => 'required',
            'years_id' => 'required',
        ];
    }
}
