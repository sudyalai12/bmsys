@extends('layouts.app')
@section('content')
    {{-- {{ $customers }} --}}
    <h1 class="heading">Customers</h1>
    <div class="floating-panel">
        <x-button btntype="secondary" class="customers">
            <a href="/customers/create">
                <span class="material-symbols-outlined">
                    person_add
                </span>
                Add new Customer
            </a>
        </x-button>
    </div>
    <x-table class="oneline">
        <thead class="customers">
            <tr>
                <th>CustID</th>
                <th>CustNick</th>
                <th>CustomerName</th>
                <th>Address1</th>
                <th>Address2</th>
                <th>City</th>
                <th>Pincode</th>
                <th>State</th>
                <th>Country</th>
                <th>SaleTax</th>
                <th>GSTN</th>
                <th>PAN</th>
                <th>StateCode</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td><a href="/customers/{{ $customer->id }}">{{ $customer->id }}</a></td>
                    <td><a href="/customers/{{ $customer->id }}">{{ $customer->nickname }}</a></td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->address->address1 }}</td>
                    <td>{{ $customer->address->address2 }}</td>
                    <td>{{ $customer->address->city }}</td>
                    <td>{{ $customer->address->pincode }}</td>
                    <td>{{ $customer->address->state->name }}</td>
                    <td>{{ $customer->address->country->name }}</td>
                    <td>{{ $customer->tax->type }}</td>
                    <td>{{ $customer->gstn }}</td>
                    <td>{{ $customer->pan }}</td>
                    <td>{{ $customer->state_code }}</td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
@endSection
