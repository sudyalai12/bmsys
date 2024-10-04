@extends('layouts.app')
@section('js')
@endsection
@section('content')
    {{-- {{ $contact }} --}}
    <div class="floating-panel">
        <x-button class="contacts" btntype="secondary">
            <a href="/customers/create">
                <span class="material-symbols-outlined">
                    person_add
                </span>
                Add new Customer
            </a>
        </x-button>
    </div>
    <div class="form-box">
        <form method="POST" class="form customer-form" action="/contacts/{{ $contact->id }}">
            @csrf
            @method('PATCH')
            <div class="form-header">
                <h1>Edit Contact Person Details</h1>
            </div>

            <div class="form-block">
                <h2>Basic Details</h2>
                <x-form.field class="fb-100">
                    <x-form.label for="email">Email</x-form.label>
                    <x-form.input placeholder="Enter Contact Person Email" id="email" type="text" name="email"
                        value="{{ $contact->email }}" />
                    <x-form.error name="email" />
                </x-form.field>
                <x-form.field class="fb-100">
                    <x-form.label for="contact">Contact Person</x-form.label>
                    <x-form.input placeholder="Enter Contact Person Name" id="contact" type="text" name="contact"
                        value="{{ $contact->name }}" />
                    <x-form.error name="contact" />
                </x-form.field>
                <x-form.field class="fb-100">
                    <x-form.label for="department">Dept/Desig</x-form.label>
                    <x-form.input placeholder="Enter Department/Designation Name" id="department" type="text"
                        name="department" value="{{ $contact->department }}" />
                    <x-form.error name="department" />
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
