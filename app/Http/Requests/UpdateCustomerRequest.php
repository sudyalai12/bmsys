<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'customer' => 'required|min:2|max:50|string',
            'nickname' => 'required|min:3|max:6|string|regex:/^[a-zA-Z]+$/',
            'tax_type' => 'required|exists:taxes,type',
            'gstn' => 'required|string|size:15|regex:/^[a-zA-Z0-9]+$/',
            'pan' => 'required|string|size:10|regex:/^[a-zA-Z0-9]+$/',
            'state_code' => 'required|string|size:2|regex:/^[0-9]+$/',
        ];
    }

    public function messages(): array
    {
        return [
            'customer.required' => 'The customer name is required.',
            'customer.min' => 'The customer name must be at least 2 characters.',
            'customer.max' => 'The customer name may not be greater than 50 characters.',
            'customer.string' => 'The customer name must be a string.',

            'nickname.required' => 'The customer nickname is required.',
            'nickname.string' => 'The customer nickname must be a string.',
            'nickname.size' => 'The customer nickname must be 4 characters.',
            'nickname.regex' => 'The customer nickname must be alphanumeric.',
            
            'tax_type.required' => 'The contact tax type is required.',
            'tax_type.exists' => 'The tax type does not exist.',

            'gstn.required' => 'The contact GST number is required.',
            'gstn.size' => 'The contact GST number must be 15 characters.',
            'gstn.regex' => 'The contact GST number must be alphanumeric.',

            'pan.required' => 'The contact PAN number is required.',
            'pan.size' => 'The contact PAN number must be 10 characters.',
            'pan.regex' => 'The contact PAN number must be alphanumeric.',

            'state_code.required' => 'The contact state code is required.',
            'state_code.size' => 'The contact state code must be 2 characters.',
            'state_code.regex' => 'The contact state code must be alphanumeric.',
        ];
    }
}
