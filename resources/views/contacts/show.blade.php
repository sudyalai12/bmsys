@extends('layouts.app')
@section('content')
    {{-- {{ $contact }} --}}
    <h1 class="heading">Contact Person Details</h1>
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
    <table class="table mb-1">
        <tbody>
            <tr>
                <th>CustomerName</th>
                <td><a href="/customers/{{ $contact->customer->id }}">{{ $contact->customer->name }}</a>
                </td>
            </tr>
            <tr>
                <th>ContactPersonName</th>
                <td>{{ $contact->name }}</td>
            </tr>
            <tr>
                <th>DepartmentName</th>
                <td>{{ $contact->department }}</td>
            </tr>
            <tr>
                <th>Address1</th>
                <td>{{ $contact->address->address1 }}</td>
            </tr>
            <tr>
                <th>Address2</th>
                <td>{{ $contact->address->address2 }}</td>
            </tr>
            <tr>
                <th>City</th>
                <td>{{ $contact->address->city }}</td>
            </tr>
            <tr>
                <th>Pincode</th>
                <td>{{ $contact->address->pincode }}</td>
            </tr>
            <tr>
                <th>State</th>
                <td>{{ $contact->address->state->name }}</td>
            </tr>
            <tr>
                <th>Country</th>
                <td>{{ $contact->address->country->name }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></td>
            </tr>
            <tr>
                <th>Mobile</th>
                <td><a href="tel:{{ $contact->mobile }}">{{ $contact->mobile }}</a></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></td>
            </tr>
            <tr>
                <th>TaxType</th>
                <td>{{ $contact->customer->tax_type }}</td>
            </tr>
            <tr>
                <th>GSTNumber</th>
                <td>{{ $contact->customer->gstn }}</td>
            </tr>
            <tr>
                <th>PAN</th>
                <td>{{ $contact->customer->pan }}</td>
            </tr>
            <tr>
                <th>StateCode</th>
                <td>{{ $contact->customer->state_code }}</td>
            </tr>
        </tbody>
    </table>
    <x-button>
        <a href="/contacts/{{ $contact->id }}/edit">
            <span class="material-symbols-outlined">
                edit
            </span>
            Edit
        </a>
    </x-button>
    <x-button btntype="secondary" class="quotes">
        <a href="/quotes/create?contact={{ $contact->id }}">
            <span class="material-symbols-outlined">
                note_add
            </span>
            Quote
        </a>
    </x-button>
@endSection
