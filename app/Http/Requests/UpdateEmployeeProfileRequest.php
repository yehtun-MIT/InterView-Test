<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeProfileRequest extends FormRequest
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
    public function rules()
    {
        return [
            "name" => [
                'required',
                'string'
            ],
            "email" => [
                'required',
                'string'
            ],
            "address" => [
                'required',
                'string'
            ],
            "employee_id" => [
                'required',
                'string'
            ],
            "department_id" => [
                'required',
                'string'
            ],
        ];
    }
}
