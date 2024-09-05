<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'part_number' => 'required|min:2|max:30|string',
            'hsn_code' => 'required|min:2|max:30|string',
            'unit_price' => 'required|min:0|numeric',
            'purchase_price' => 'required|min:0|numeric',
            'sale_price' => 'required|min:0|numeric',
            'description' => 'required|min:2|max:255|string',
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

            'part_number.required' => 'The part number is required.',
            'part_number.min' => 'The part number must be at least 2 characters.',
            'part_number.max' => 'The part number may not be greater than 30 characters.',
            'part_number.string' => 'The part number must be a string.',

            'hsn_code.required' => 'The HSN code is required.',
            'hsn_code.min' => 'The HSN code must be at least 2 characters.',
            'hsn_code.max' => 'The HSN code may not be greater than 30 characters.',
            'hsn_code.string' => 'The HSN code must be a string.',

            'unit_price.required' => 'The unit price is required.',
            'unit_price.min' => 'The unit price must be at least 0.',
            'unit_price.numeric' => 'The unit price must be a number.',

            'purchase_price.required' => 'The purchase price is required.',
            'purchase_price.min' => 'The purchase price must be at least 0.',
            'purchase_price.numeric' => 'The purchase price must be a number.',

            'sale_price.required' => 'The sale price is required.',
            'sale_price.min' => 'The sale price must be at least 0.',
            'sale_price.numeric' => 'The sale price must be a number.',

            'description.required' => 'The description is required.',
            'description.min' => 'The description must be at least 2 characters.',
            'description.max' => 'The description may not be greater than 255 characters.',
            'description.string' => 'The description must be a string.',
        ];
    }
}
