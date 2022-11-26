<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourses extends FormRequest
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
            'course_name' => 'required|unique:courses,course_name,'.$this->id,
            'course_code' => 'required|unique:courses,course_code,'.$this->id,
            'courses_credit_hours' => 'required',
        ];
    }
}
