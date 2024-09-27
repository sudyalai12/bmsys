@extends('layouts.app')
@section('content')
    {{-- {{ $suppliers }} --}}
    <h1 class="heading">Our Suppliers</h1>
    <x-button class="suppliers" btntype="secondary"><a href="/products/create">Add new Product</a></x-button>
    <x-table>
        <thead class="suppliers">
            <tr>
                <th>SupplierID</th>
                <th>SupplierName</th>
                <th>Country</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $supplier)
                <tr>
                    <td><a href="/suppliers/{{ $supplier->id }}">{{ $supplier->id }}</a></td>
                    <td><a href="/suppliers/{{ $supplier->id }}">{{ $supplier->name }}</a></td>
                    <td>{{ $supplier->country->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
@endSection
