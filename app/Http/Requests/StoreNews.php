<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNews extends FormRequest
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
            'title' => 'required|unique:naws,title'.$this->id,
            'photos' => 'required|image'.$this->id,
            'abstract' => 'required'.$this->id,
            'details' => 'required'.$this->id,
        ];
    }
}
