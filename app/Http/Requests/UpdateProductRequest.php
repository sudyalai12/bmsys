<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'part_number' => 'required|min:2|max:30|string',
            'hsn_code' => 'required|min:2|max:30|string',
            'unit_price' => 'required|min:0|numeric',
            'purchase_price' => 'required|min:0|numeric',
            'sale_price' => 'required|min:0|numeric',
            'description' => 'required|min:2|max:100|string',
        ];
    }

    public function messages(): array
    {
        return [];
    }
}
