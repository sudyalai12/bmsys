@extends('layouts.app')
@section('js')
@endsection
@section('content')
    <div class="form-box">
        <form method="POST" class="form quote-form" action="/quotes">
            @csrf
            <div class="form-header">
                <h1>Create Quote</h1>
            </div>
            <div class="form-block">
                <x-form.field class="fb-200">
                    <x-form.label for="customer">Select Customer</x-form.label>
                    <x-form.input placeholder="Enter Customer Name" id="customer" type="text" name="customer"
                        value="{{ old('customer', $contact?->customer->name) }}" />
                    <x-form.error name="customer" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="contact">Select ContactPerson</x-form.label>
                    <x-form.input placeholder="Enter Contact Person Name" id="contact" type="text" name="contact"
                        value="{{ old('contact', $contact?->name) }}" />
                    <x-form.error name="contact" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="enquiry_reference">Enquiry Ref</x-form.label>
                    <x-form.input placeholder="Enter Enquiry Reference" id="enquiry_reference" type="text"
                        name="enquiry_reference" value="Email Dated: {{ date('d/m/Y') }}" />
                    <x-form.error name="enquiry_reference" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="enquiry_date">Enquiry Date</x-form.label>
                    <input placeholder="Enter Enquiry Date" id="enquiry_date" type="date" name="enquiry_date"
                        value="{{ old('enquiry_date') == '' ? date('Y-m-d') : old('enquiry_date') }}">
                    <x-form.error name="enquiry_date" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="due_date">Due Date</x-form.label>
                    <input placeholder="Enter Due Date" id="due_date" type="date" name="due_date"
                        value="{{ old('due_date') == '' ? date('Y-m-d') : old('due_date') }}">
                    <x-form.error name="due_date" />
                </x-form.field>
                <x-form.field class="fb-300">
                    <x-form.label for="supplier">Select Supplier</x-form.label>
                    <x-form.input placeholder="Enter Supplier Name" id="supplier" type="text" name="supplier"
                        value="{{ old('supplier') }}" />
                    <x-form.error name="supplier" />
                </x-form.field>
                <x-form.field class="fb-300">
                    <x-form.label for="part_number">Select Product</x-form.label>
                    <x-form.input placeholder="Enter Product Part Number" id="part_number" type="text" name="part_number"
                        value="{{ old('part_number') }}" />
                    <x-form.error name="part_number" />
                </x-form.field>
                <x-form.field class="fb-100">
                    <x-form.label for="quantity">Quantity</x-form.label>
                    <x-form.input placeholder="Enter Quantity" id="quantity" type="number" name="quantity" value="1"
                        min="1" />
                    <x-form.error name="quantity" />
                </x-form.field>
            </div>

            <div class="text-center">
                <x-button class="quotes" btntype="secondary" type="submit">Save</x-button>
                <x-button btntype="treansparent" type="reset">Reset</x-button>
            </div>
        </form>
    </div>
@endSection
