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
    <x-table>
        <thead class="customers">
            <tr>
                <th>CustID</th>
                <th>CustNick</th>
                <th>CustomerName</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td><a href="/customers/{{ $customer->id }}">{{ $customer->id }}</a></td>
                    <td><a href="/customers/{{ $customer->id }}">{{ $customer->nickname }}</a></td>
                    <td>{{ $customer->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
@endSection
