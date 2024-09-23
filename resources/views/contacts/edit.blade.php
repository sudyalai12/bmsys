@extends('layouts.app')
@section('js')
@endsection
@section('content')
    {{-- {{ $contact }} --}}
    <div class="form-box">
        <form method="POST" class="form customer-form" action="/contacts/{{ $contact->id }}">
            @csrf
            @method('PATCH')
            <div class="form-header">
                <h1>Edit Contact Person Details</h1>
                <p>Edit the details of the Contact Person</p>
            </div>

            <div class="form-block">
                <h2>Basic Details</h2>
                <x-form.field class="fb-100">
                    <x-form.label for="customer">Customer Name</x-form.label>
                    <x-form.input placeholder="Enter Customer Name" id="customer" type="text" name="customer"
                        value="{{ $contact->customer->name }}" />
                    <x-form.error name="customer" />
                </x-form.field>
                <x-form.field class="fb-100">
                    <x-form.label for="nickname">Customer Nick Name</x-form.label>
                    <x-form.input placeholder="Enter Customer Nick Name" id="nickname" type="text" name="nickname"
                        value="{{ $contact->customer->nickname }}" />
                    <x-form.error name="nickname" />
                </x-form.field>
                <x-form.field class="fb-100">
                    <x-form.label for="email">Email Address</x-form.label>
                    <x-form.input placeholder="Enter Contact Person Email" id="email" type="text" name="email"
                        value="{{ $contact->email }}" />
                    <x-form.error name="email" />
                </x-form.field>
                <x-form.field class="fb-100">
                    <x-form.label for="contact">Contact Person Name</x-form.label>
                    <x-form.input placeholder="Enter Contact Person Name" id="contact" type="text" name="contact"
                        value="{{ $contact->name }}" />
                    <x-form.error name="contact" />
                </x-form.field>
                <x-form.field class="fb-100">
                    <x-form.label for="department">Department</x-form.label>
                    <x-form.input placeholder="Enter Department Name" id="department" type="text" name="department"
                        value="{{ $contact->department }}" />
                    <x-form.error name="department" />
                </x-form.field>
            </div>

            <div class="form-block">
                <h2>Address Details</h2>
                <x-form.field class="fb-500">
                    <x-form.label for="address1">Address1</x-form.label>
                    <x-form.input placeholder="Enter Address" id="address1" type="text" name="address1"
                        value="{{ $contact->address->address1 }}" />
                    <x-form.error name="address1" />
                </x-form.field>
                <x-form.field class="fb-500">
                    <x-form.label for="address2">Address2</x-form.label>
                    <x-form.input placeholder="Enter Address" id="address2" type="text" name="address2"
                        value="{{ $contact->address->address2 }}" />
                    <x-form.error name="address2" />
                </x-form.field>
                <x-form.field class="fb-100">
                    <x-form.label for="city">City</x-form.label>
                    <x-form.input placeholder="Enter City" id="city" type="text" name="city"
                        value="{{ $contact->address->city }}" />
                    <x-form.error name="city" />
                </x-form.field>
                <x-form.field class="fb-100">
                    <x-form.label for="pincode">Pin Code</x-form.label>
                    <x-form.input placeholder="Enter Pin Code" id="pincode" type="text" name="pincode"
                        value="{{ $contact->address->pincode }}" />
                    <x-form.error name="pincode" />
                </x-form.field>
                <x-form.field class="fb-100">
                    <x-form.label for="state">State</x-form.label>
                    <x-form.input placeholder="Enter State" id="state" type="text" name="state"
                        value="{{ $contact->address->state->name }}" />
                    <x-form.error name="state" />
                </x-form.field>
                <x-form.field class="fb-100">
                    <x-form.label for="country">Country</x-form.label>
                    <x-form.input placeholder="Enter Country" id="country" type="text" name="country"
                        value="{{ $contact->address->country->name }}" />
                    <x-form.error name="country" />
                </x-form.field>
            </div>

            <div class="form-block">
                <h2>Contact Details</h2>
                <x-form.field class="fb-100">
                    <x-form.label for="phone">Phone Number</x-form.label>
                    <x-form.input placeholder="Enter Phone Number Eg: +91 0000000000" id="phone" type="text"
                        name="phone" value="{{ $contact->phone }}" />
                    <x-form.error name="phone" />
                </x-form.field>
                <x-form.field class="fb-100">
                    <x-form.label for="mobile">Mobile Number</x-form.label>
                    <x-form.input placeholder="Enter Mobile Number Eg: +91 0000000000" id="mobile" type="text"
                        name="mobile" value="{{ $contact->mobile }}" />
                    <x-form.error name="mobile" />
                </x-form.field>
            </div>

            <div class="form-block">
                <h2>Tax Details</h2>
                <x-form.field class="fb-100">
                    <x-form.label for="tax_type">SaleTax</x-form.label>
                    <x-form.input placeholder="Enter Tax Type" id="tax_type" type="text" name="tax_type"
                        value="{{ $contact->customer->tax_type }}" />
                    <x-form.error name="tax_type" />
                </x-form.field>
                <x-form.field class="fb-100">
                    <x-form.label for="gstn">GST Number</x-form.label>
                    <x-form.input placeholder="Enter GST Number (15 digit)" id="gstn" type="text" name="gstn"
                        value="{{ $contact->customer->gstn }}" />
                    <x-form.error name="gstn" />
                </x-form.field>
                <x-form.field class="fb-100">
                    <x-form.label for="pan">PAN</x-form.label>
                    <x-form.input placeholder="Enter PAN (10 digit)" id="pan" type="text" name="pan"
                        value="{{ $contact->customer->pan }}" />
                    <x-form.error name="pan" />
                </x-form.field>
                <x-form.field class="fb-100">
                    <x-form.label for="state_code">State Code</x-form.label>
                    <x-form.input placeholder="Enter State Code (2 digit)" id="state_code" type="text"
                        name="state_code" value="{{ $contact->customer->state_code }}" />
                    <x-form.error name="state_code" />
                </x-form.field>
            </div>

            <div class="text-center">
                <x-button type="submit">Save</x-button>
                <x-button btntype="danger" form="delete-form">Delete</x-button>
            </div>
        </form>
        <form action="/contacts/{{ $contact->id }}" method="POST" id="delete-form">
            @csrf
            @method('DELETE')
        </form>
    </div>
@endSection
