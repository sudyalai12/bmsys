<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|min:2|max:50|email',
            'contact' => 'required|min:2|max:50|string',
            'department' => 'required|min:2|max:50|string',
            'phone' => 'required|min:10|max:16|string',
            'mobile' => 'required|min:10|max:16|string',
        ];
    }

    public function messages(): array
    {
        return [];
    }
}
