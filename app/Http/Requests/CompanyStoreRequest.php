<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyStoreRequest extends FormRequest
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
    public function rules(): array
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
                Rule::unique('companies')
                ],

            'logo' => [
                'file',
                'dimensions:min_width=100,min_height=100',
                'sometimes'
            ]
        ];
    }
}
