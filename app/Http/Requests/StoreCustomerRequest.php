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
            'nickname' => 'required|min:2|max:5|string|regex:/^[a-zA-Z]+$/',
            'email' => 'required|min:2|max:50|email',
            'contact' => 'required|min:2|max:50|string',
            'department' => 'required|min:2|max:50|string',
            'address1' => 'required|min:2|max:100|string',
            'address2' => 'required|min:2|max:100|string',
            'city' => 'required|min:2|max:30|string',
            'pincode' => 'required|size:6|regex:/^[0-9]+$/',
            'state' => 'required|min:2|max:30|string',
            'country' => 'required|exists:countries,name',
            'phone' => 'required|min:10|max:18|string|regex:/^[0-9+ ]+$/',
            'mobile' => 'required|min:10|max:18|string|regex:/^[0-9+ ]+$/',
            'tax_type' => 'required|exists:taxes,type',
            'gstn' => 'required|string|size:15|regex:/^[a-zA-Z0-9]+$/',
            'pan' => 'required|string|size:10|regex:/^[a-zA-Z0-9]+$/',
            'state_code' => 'required|string|size:2|regex:/^[a-zA-Z]+$/',
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

            'email.required' => 'The contact email is required.',
            'email.min' => 'The contact email must be at least 2 characters.',
            'email.max' => 'The contact email may not be greater than 50 characters.',
            'email.email' => 'The contact email must be a valid email address.',

            'contact.required' => 'The contact name is required.',
            'contact.min' => 'The contact name must be at least 2 characters.',
            'contact.max' => 'The contact name may not be greater than 50 characters.',
            'contact.string' => 'The contact name must be a string.',

            'department.required' => 'The contact department name is required.',
            'department.min' => 'The contact department name must be at least 2 characters.',
            'department.max' => 'The contact department name may not be greater than 50 characters.',
            'department.string' => 'The contact department name must be a string.',

            'address1.required' => 'The contact address is required.',
            'address1.min' => 'The contact address must be at least 2 characters.',
            'address1.max' => 'The contact address may not be greater than 100 characters.',
            'address1.string' => 'The contact address must be a string.',

            'address2.required' => 'The contact address is required.',
            'address2.min' => 'The contact address must be at least 2 characters.',
            'address2.max' => 'The contact address may not be greater than 100 characters.',
            'address2.string' => 'The contact address must be a string.',

            'city.required' => 'The contact city name is required.',
            'city.min' => 'The contact city name must be at least 2 characters.',
            'city.max' => 'The contact city name may not be greater than 30 characters.',
            'city.string' => 'The contact city name must be a string.',

            'pincode.required' => 'The contact pincode number is required.',
            'pincode.size' => 'The contact pincode number must be 6 characters.',
            'pincode.regex' => 'The contact pincode number must be numeric.',

            'state.required' => 'The contact state name is required.',
            'state.min' => 'The contact state name must be at least 2 characters.',
            'state.max' => 'The contact state name may not be greater than 30 characters.',
            'state.string' => 'The contact state name must be a string.',

            'country.required' => 'The country name is required.',
            'country.exists' => 'The country name does not exist.',

            'phone.required' => 'The contact phone number is required.',
            'phone.min' => 'The contact phone number must be at least 10 characters.',
            'phone.max' => 'The contact phone number may not be greater than 15 characters.',
            'phone.regex' => 'The contact phone number must be numeric.',

            'mobile.required' => 'The contact mobile number is required.',
            'mobile.min' => 'The contact mobile number must be at least 10 characters.',
            'mobile.max' => 'The contact mobile number may not be greater than 15 characters.',
            'mobile.regex' => 'The contact mobile number must be numeric.',

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
