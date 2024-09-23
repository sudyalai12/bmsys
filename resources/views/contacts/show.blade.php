@extends('layouts.app')
@section('content')
    {{-- {{ $contact }} --}}
    <h1 class="heading">Contact Person Details</h1>
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
                <td>{{ $contact->phone }}</td>
            </tr>
            <tr>
                <th>Mobile</th>
                <td>{{ $contact->mobile }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $contact->email }}</td>
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
    <x-button><a href="/contacts/{{ $contact->id }}/edit">Edit</a></x-button>
    <x-button btntype="secondary"><a href="/quotes/create?contact={{ $contact->id }}">Quote</a></x-button>
@endSection
