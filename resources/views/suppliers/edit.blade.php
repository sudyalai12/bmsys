@extends('layouts.app')
@section('js')
@endsection
@section('content')
    <div class="form-box">
        <form method="POST" class="form customer-form" action="/suppliers/{{ $supplier->id }}">
            @csrf
            @method('PATCH')
            <div class="form-header">
                <h1>Edit Supplier Details</h1>
                <p>Edit the details of the Supplier</p>
            </div>

            <div class="form-block">
                <x-form.field class="fb-200">
                    <x-form.label for="supplier">Supplier Name</x-form.label>
                    <x-form.input placeholder="Enter Supplier Name" id="supplier" type="text" name="supplier"
                        value="{{ $supplier->name }}" />
                    <x-form.error name="supplier" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="supplier_fullname">Supplier Fullname</x-form.label>
                    <x-form.input placeholder="Enter Supplier Full Name" id="supplier_fullname" type="text"
                        name="supplier_fullname" value="{{ $supplier->fullname }}" />
                    <x-form.error name="supplier_fullname" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="supplier_country">Supplier's Country</x-form.label>
                    <x-form.input placeholder="Enter Supplier Country Name" id="supplier_country" type="text"
                        name="supplier_country" value="{{ $supplier->country->name }}" />
                    <x-form.error name="supplier_country" />
                </x-form.field>
            </div>

            <div class="text-center">
                <x-button type="submit">Save</x-button>
                <x-button btntype="danger" form="delete-form">Delete</x-button>
            </div>
        </form>

        <form id="delete-form" method="POST" action="/suppliers/{{ $supplier->id }}">
            @csrf
            @method('DELETE')
        </form>
    </div>
@endSection
