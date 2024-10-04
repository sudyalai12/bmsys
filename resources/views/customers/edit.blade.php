@extends('layouts.app')
@section('js')
@endsection
@section('content')
    {{-- {{ $customer }} --}}
    <div class="floating-panel">
        <x-button btntype="secondary" class="customers">
            <a href="/customers/create">
                <span class="material-symbols-outlined">
                    person_add
                </span>
                Add new Customer
            </a>
        </x-button>
    </div>
    <div class="form-box">
        <form method="POST" class="form customer-form" action="/customers/{{ $customer->id }}">
            @csrf
            @method('PATCH')
            <div class="form-header">
                <h1>Edit Customer Details</h1>
            </div>

            <div class="form-block">
                <h2>Basic Details</h2>
                <x-form.field class="fb-100">
                    <x-form.label for="customer">Customer</x-form.label>
                    <x-form.input placeholder="Enter Customer Name" id="customer" type="text" name="customer"
                        value="{{ $customer->name }}" />
                    <x-form.error name="customer" />
                </x-form.field>
                <x-form.field class="fb-100">
                    <x-form.label for="nickname">Customer Nick</x-form.label>
                    <x-form.input placeholder="Enter Customer Nick Name" id="nickname" type="text" name="nickname"
                        value="{{ $customer->nickname }}" />
                    <x-form.error name="nickname" />
                </x-form.field>
            </div>

            <div class="form-block">
                <h2>Address Details</h2>
                <x-form.field class="fb-200">
                    <x-form.label for="address1">Address1</x-form.label>
                    <x-form.input placeholder="Enter Address" id="address1" type="text" name="address1"
                        value="{{ $customer->address->address1 }}" />
                    <x-form.error name="address1" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="address2">Address2</x-form.label>
                    <x-form.input placeholder="Enter Address" id="address2" type="text" name="address2"
                        value="{{ $customer->address->address2 }}" />
                    <x-form.error name="address2" />
                </x-form.field>
                <x-form.field class="fb-100">
                    <x-form.label for="city">City</x-form.label>
                    <x-form.input placeholder="Enter City" id="city" type="text" name="city"
                        value="{{ $customer->address->city }}" />
                    <x-form.error name="city" />
                </x-form.field>
                <x-form.field class="fb-100">
                    <x-form.label for="pincode">Pincode</x-form.label>
                    <x-form.input placeholder="Enter Pin Code" id="pincode" type="text" name="pincode"
                        value="{{ $customer->address->pincode }}" />
                    <x-form.error name="pincode" />
                </x-form.field>
                <x-form.field class="fb-100">
                    <x-form.label for="state">State</x-form.label>
                    <x-form.input placeholder="Enter State" id="state" type="text" name="state"
                        value="{{ $customer->address->state->name }}" />
                    <x-form.error name="state" />
                </x-form.field>
                <x-form.field class="fb-100">
                    <x-form.label for="country">Country</x-form.label>
                    <x-form.input placeholder="Enter Country" id="country" type="text" name="country"
                        value="{{ $customer->address->country->name }}" />
                    <x-form.error name="country" />
                </x-form.field>
            </div>

            <div class="form-block">
                <h2>Tax Details</h2>
                <x-form.field class="fb-100">
                    <x-form.label for="tax_type">SaleTax</x-form.label>
                    <x-form.input placeholder="Enter Tax Type" id="tax_type" type="text" name="tax_type"
                        value="{{ $customer->tax->type }}" />
                    <x-form.error name="tax_type" />
                </x-form.field>
                <x-form.field class="fb-100">
                    <x-form.label for="gstn">GST</x-form.label>
                    <x-form.input placeholder="Enter GST Number (15 digit)" id="gstn" type="text" name="gstn"
                        value="{{ $customer->gstn }}" />
                    <x-form.error name="gstn" />
                </x-form.field>
                <x-form.field class="fb-100">
                    <x-form.label for="pan">PAN</x-form.label>
                    <x-form.input placeholder="Enter PAN (10 digit)" id="pan" type="text" name="pan"
                        value="{{ $customer->pan }}" />
                    <x-form.error name="pan" />
                </x-form.field>
                <x-form.field class="fb-100">
                    <x-form.label for="state_code">State Code</x-form.label>
                    <x-form.input placeholder="Enter State Code (2 digit)" id="state_code" type="text"
                        name="state_code" value="{{ $customer->state_code }}" />
                    <x-form.error name="state_code" />
                </x-form.field>
            </div>

            <div class="text-center">
                <x-button type="submit">Save</x-button>
                <x-button btntype="danger" form="delete-form">Delete</x-button>
            </div>
        </form>
        <form action="/customers/{{ $customer->id }}" method="POST" id="delete-form">
            @csrf
            @method('DELETE')
        </form>
    </div>
@endSection
