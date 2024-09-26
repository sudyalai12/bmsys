<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierRequest extends FormRequest
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
            'supplier' => 'required|min:2|max:50|string',
            'supplier_country' => 'required|exists:countries,name',
        ];
    }

    public function messages(): array
    {
        return [
            'supplier.required' => 'The supplier name is required.',
            'supplier.min' => 'The supplier name must be at least 2 characters.',
            'supplier.max' => 'The supplier name may not be greater than 50 characters.',
            'supplier.string' => 'The supplier name must be a string.',

            'supplier_country.required' => 'The supplier country is required.',
            'supplier_country.exists' => 'The country name does not exist.',
        ];
    }
}