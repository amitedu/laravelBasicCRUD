<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string'
            ],

            'website' => [
                'required',
                'string'
            ],

            'email' => [
                'required',
                'email',
                Rule::unique('companies')->ignore($this->company)
            ],

            'logo' => [
                'image',
                'dimensions:min_width=100,min_height=100',
            ]
        ];
    }
}
