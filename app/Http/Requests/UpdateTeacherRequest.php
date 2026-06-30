<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'teacher_id' => 'required',
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'nullable|email',
            'phone'      => 'nullable',
        ];
    }
}
