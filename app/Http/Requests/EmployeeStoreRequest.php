<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeStoreRequest extends FormRequest
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
            'first_name' => [
                'required',
                'alpha'
            ],

            'last_name' => [
                'required',
                'alpha'
            ],

            'email' => [
                'required',
                'email',
                Rule::unique('employees')
            ],

            'phone' => [
                'required',
                'regex:/^([0-9\s\-\+\(\)]*)$/',
                'min:10',
                Rule::unique('employees')
            ]
        ];
    }
}
