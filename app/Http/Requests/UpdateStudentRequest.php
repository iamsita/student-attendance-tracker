<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'registration_number' => [
                'required',
                'string',
                'max:255',
            ],
            'first_name' => [
                'required',
                'string',
                'max:255',
            ],
            'last_name' => [
                'required',
                'string',
                'max:255',
            ],
            'phone' => [
                'required',
                'string',
                'max:255',
            ],
            'class_name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'string',
                'max:255',
            ],
        ];
    }
}
