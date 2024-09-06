@extends('layouts.app')
@section('content')
    {{-- {{ $customers }} --}}
    <h1 class="heading">Customers</h1>
    <x-button btntype="secondary"><a href="/customers/create">Add new Customer</a></x-button>
    <x-table>
        <thead>
            <tr>
                <th>CustID</th>
                <th>CustomerName</th>
                <th>CustNick</th>
                <th>Country</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td><a href="/customers/{{ $customer->id }}">{{ $customer->id }}</a></td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->nickname }}</td>
                    <td>{{ $customer->country->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
@endSection