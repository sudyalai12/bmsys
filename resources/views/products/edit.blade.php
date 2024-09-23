@extends('layouts.app')
@section('js')
@endsection
@section('content')
    <div class="form-box">
        <form method="POST" class="form customer-form" action="/products/{{ $product->id }}">
            @csrf
            @method('PATCH')
            <div class="form-header">
                <h1>Edit Product Details</h1>
                <p>Edit the details of the Product</p>
            </div>

            <div class="form-block">
                <x-form.field class="fb-200">
                    <x-form.label for="part_number">Part Number</x-form.label>
                    <x-form.input placeholder="Enter Part Number" id="part_number" type="text" name="part_number"
                        value="{{ $product->part_number }}" />
                    <x-form.error name="part_number" />
                </x-form.field>
                <x-form.field class="fb-300">
                    <x-form.label for="description">Description</x-form.label>
                    <x-form.input placeholder="Enter Product Description" id="description" type="text" name="description"
                        value="{{ $product->description }}" />
                    <x-form.error name="description" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="supplier">Supplier Name</x-form.label>
                    <x-form.input placeholder="Enter Supplier Name" id="supplier" type="text" name="supplier"
                        value="{{ $product->supplier->name }}" />
                    <x-form.error name="supplier" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="supplier_country">Supplier's Country</x-form.label>
                    <x-form.input placeholder="Enter Supplier Country Name" id="supplier_country" type="text"
                        name="supplier_country" value="{{ $product->supplier->country->name }}" />
                    <x-form.error name="supplier_country" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="hsn_code">HSN Code</x-form.label>
                    <x-form.input placeholder="Enter HSN Code" id="hsn_code" type="text" name="hsn_code"
                        value="{{ $product->hsn_code }}" />
                    <x-form.error name="hsn_code" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="unit_price">Unit Price</x-form.label>
                    <x-form.input placeholder="Enter Unit Price" id="unit_price" type="number" name="unit_price"
                        value="{{ $product->unit_price }}" />
                    <x-form.error name="unit_price" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="purchase_price">Purchase Price</x-form.label>
                    <x-form.input placeholder="Enter Purchase Price" id="purchase_price" type="number"
                        name="purchase_price" value="{{ $product->purchase_price }}" />
                    <x-form.error name="purchase_price" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="sale_price">Sale Price</x-form.label>
                    <x-form.input placeholder="Enter Sale Price" id="sale_price" type="number" name="sale_price"
                        value="{{ $product->sale_price }}" />
                    <x-form.error name="sale_price" />
                </x-form.field>
            </div>

            <div class="text-center">
                <x-button type="submit">Save</x-button>
                <x-button btntype="danger" form="delete-form">Delete</x-button>
            </div>
        </form>

        <form id="delete-form" method="POST" action="/products/{{ $product->id }}">
            @csrf
            @method('DELETE')
        </form>
    </div>
@endSection
