@extends('layouts.app')
@section('js')
@endsection
@section('content')
    <div class="form-box">
        <form method="POST" class="form customer-form" action="/products">
            @csrf
            <div class="form-header">
                <h1>Product Details</h1>
                <p>Enter the details of the Product</p>
            </div>
            <div class="form-block">
                <x-form.field class="fb-200">
                    <x-form.label for="supplier">Supplier Name</x-form.label>
                    <x-form.input placeholder="Enter Supplier Name" id="supplier" type="text" name="supplier"
                        value="{{ old('supplier') }}" />
                    <x-form.error name="supplier" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="supplier_country">Supplier's Country</x-form.label>
                    <x-form.input placeholder="Enter Supplier Country Name" id="supplier_country" type="text" name="supplier_country"
                        value="{{ old('supplier_country') }}" />
                    <x-form.error name="supplier_country" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="part_number">Part Number</x-form.label>
                    <x-form.input placeholder="Enter Part Number" id="part_number" type="text" name="part_number"
                        value="{{ old('part_number') }}" />
                    <x-form.error name="part_number" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="hsn_code">HSN Code</x-form.label>
                    <x-form.input placeholder="Enter HSN Code" id="hsn_code" type="text" name="hsn_code"
                        value="{{ old('hsn_code') }}" />
                    <x-form.error name="hsn_code" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="unit_price">Unit Price</x-form.label>
                    <x-form.input placeholder="Enter Unit Price" id="unit_price" type="number" name="unit_price"
                        value="{{ old('unit_price') }}" />
                    <x-form.error name="unit_price" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="purchase_price">Purchase Price</x-form.label>
                    <x-form.input placeholder="Enter Purchase Price" id="purchase_price" type="number" name="purchase_price"
                        value="{{ old('purchase_price') }}" />
                    <x-form.error name="purchase_price" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="sale_price">Sale Price</x-form.label>
                    <x-form.input placeholder="Enter Sale Price" id="sale_price" type="number" name="sale_price"
                        value="{{ old('sale_price') }}" />
                    <x-form.error name="sale_price" />
                </x-form.field>
                <x-form.field class="fb-500">
                    <x-form.label for="description">Description</x-form.label>
                    <x-form.input placeholder="Enter Product Description" id="description" type="text" name="description"
                        value="{{ old('description') }}" />
                    <x-form.error name="description" />
                </x-form.field>
            </div>

            <div class="text-center">
                <x-button btntype="secondary" type="submit">Save</x-button>
            </div>
        </form>
    </div>
@endSection
