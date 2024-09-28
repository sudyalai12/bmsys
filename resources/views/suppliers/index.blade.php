@extends('layouts.app')
@section('content')
    {{-- {{ $suppliers }} --}}
    <h1 class="heading">Our Suppliers</h1>
    <div class="floating-panel">
        <x-button class="suppliers" btntype="secondary"><a href="/products/create"><span class="material-symbols-outlined">
                    add_shopping_cart
                </span>Add new Product</a></x-button>
    </div>
    <x-table>
        <thead class="suppliers">
            <tr>
                <th>SuppID</th>
                <th>SupplierName</th>
                <th>SupplierFullName</th>
                <th>Country</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $supplier)
                <tr>
                    <td><a href="/suppliers/{{ $supplier->id }}">{{ $supplier->id }}</a></td>
                    <td><a href="/suppliers/{{ $supplier->id }}">{{ $supplier->name }}</a></td>
                    <td><a href="/suppliers/{{ $supplier->id }}">{{ $supplier->fullname }}</a></td>
                    <td>{{ $supplier->country->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
@endSection
