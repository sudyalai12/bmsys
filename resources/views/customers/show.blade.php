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
        </tbody>
    </table>
@endSection
