@extends('layouts.app')
@section('content')
    {{-- {{ $contacts }} --}}
    <h1 class="heading contacts-heading">Contact Persons</h1>
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
    <x-table class="oneline">
        <thead class="contacts">
            <tr>
                <th>ContID</th>
                <th>ContactPersonName</th>
                <th>Customer</th>
                <th>Phone</th>
                <th>Mobile</th>
                <th>Department</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td><a href="/contacts/{{ $contact->id }}">{{ $contact->id }}</a></td>
                    <td><a href="/contacts/{{ $contact->id }}">{{ $contact->name }}</a></td>
                    <td><a href="/customers/{{ $contact->customer->id }}">{{ $contact->customer->nickname }}</a></td>
                    <td><a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></td>
                    <td><a href="tel:{{ $contact->mobile }}">{{ $contact->mobile }}</a></td>
                    <td>{{ $contact->department }}</td>
                    <td><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
@endSection
