<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurricula extends FormRequest
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
            'departments_id' => 'required|unique:curricula,departments_id,'.$this->id,
            'semesters_id' => 'required|unique:curricula,semesters_id,except,id',
            'years_id' => 'required|unique:curricula,years_id,except,id',
            'courses_id' => 'required|unique:curricula,courses_id,except,id',
        ];
    }
}
