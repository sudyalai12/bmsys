<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'nickname' => 'required|min:3|max:7|string',
            'email' => 'required|min:2|max:50|email',
            'contact' => 'required|min:2|max:50|string',
            'department' => 'required|min:2|max:50|string',
            'address1' => 'required|min:2|max:100|string',
            'address2' => 'required|min:2|max:100|string',
            'city' => 'required|min:2|max:30|string',
            'pincode' => 'required|size:6|regex:/^[0-9]+$/',
            'state' => 'required|exists:states,name',
            'country' => 'required|exists:countries,name',
            'phone' => 'required|min:10|max:16|string',
            'mobile' => 'required|min:10|max:16|string',
            'tax_type' => 'required|exists:taxes,type',
            'gstn' => 'required|string|size:15',
            'pan' => 'required|string|size:10',
            'state_code' => 'required|string|size:2',
        ];
    }

    public function messages(): array
    {
        return [
        ];
    }
}
