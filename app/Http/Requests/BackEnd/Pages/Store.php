<?php

namespace App\Http\Requests\BackEnd\Pages;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            
            'name' => ['required', 'string', 'max:191'],
            'desc' => ['required','min:10'],
            'meta_keywords' => ['required', 'max:191'],
            'meta_descs' => ['required', 'max:191'],
            
        ];
    }
}
