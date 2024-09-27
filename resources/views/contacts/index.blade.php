@extends('layouts.app')
@section('content')
    {{-- {{ $contacts }} --}}
    <h1 class="heading contacts-heading">Contact Persons</h1>
    <x-button class="contacts" btntype="secondary"><a href="/customers/create">Add new Customer</a></x-button>
    <x-table>
        <thead class="contacts">
            <tr>
                <th>CPID</th>
                <th>ContactPersonName</th>
                <th>CustomerNick</th>
                <th>Dept/Desig</th>
                <th>Address1</th>
                <th>Address2</th>
                <th>City</th>
                <th>Pincode</th>
                <th>State</th>
                <th>Country</th>
                <th>Phone</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>TaxType</th>
                <th>GSTN</th>
                <th>PAN</th>
                <th>StateCode</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td><a href="/contacts/{{ $contact->id }}">{{ $contact->id }}</a></td>
                    <td><a href="/contacts/{{ $contact->id }}">{{ $contact->name }}</a></td>
                    <td><a href="/customers/{{ $contact->customer->id }}">{{ $contact->customer->nickname }}</a></td>
                    <td>{{ $contact->department }}</td>
                    <td>{{ $contact->address->address1 }}</td>
                    <td>{{ $contact->address->address2 }}</td>
                    <td>{{ $contact->address->city }}</td>
                    <td>{{ $contact->address->pincode }}</td>
                    <td>{{ $contact->address->state->name }}</td>
                    <td>{{ $contact->address->country->name }}</td>
                    <td class="oneline"><a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></td>
                    <td class="oneline"><a href="tel:{{ $contact->mobile }}">{{ $contact->mobile }}</a></td>
                    <td><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></td>
                    <td>{{ $contact->customer->tax_type }}</td>
                    <td>{{ $contact->customer->gstn }}</td>
                    <td>{{ $contact->customer->pan }}</td>
                    <td>{{ $contact->customer->state_code }}</td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
@endSection
