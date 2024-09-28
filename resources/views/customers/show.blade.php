@extends('layouts.app')
@section('content')
    {{-- {{ $customer }} --}}
    <h1 class="heading">Customer Details</h1>
    <table class="table mb-1">
        <tbody>
            <tr>
                <th>Customer Name</th>
                <td>{{ $customer->name }}</td>
            </tr>
            <tr>
                <th>Customer Nick</th>
                <td>{{ $customer->nickname }}</td>
            </tr>
            <tr>
                <th>Contact Persons</th>
                <td>
                    @foreach ($customer->contacts as $contact)
                        <a href="/contacts/{{ $contact->id }}">{{ $contact->name }}</a>
                        ,<br>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>Sale Tax</th>
                <td>{{ $customer->tax_type }}</td>
            </tr>
            <tr>
                <th>GST Number</th>
                <td>{{ $customer->gstn }}</td>
            </tr>
            <tr>
                <th>PAN</th>
                <td>{{ $customer->pan }}</td>
            </tr>
            <tr>
                <th>State Code</th>
                <td>{{ $customer->state_code }}</td>
            </tr>
        </tbody>
    </table>
    <x-button><a href="/customers/{{ $customer->id }}/edit"><span class="material-symbols-outlined">
                edit
            </span>Edit</a></x-button>
@endSection
