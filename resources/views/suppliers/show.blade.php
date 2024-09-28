@extends('layouts.app')
@section('content')
    {{-- {{ $supplier }} --}}
    <h1 class="heading">Supplier Details</h1>
    <div class="floating-panel">
        <x-button class="suppliers" btntype="secondary">
            <a href="/products/create">
                <span class="material-symbols-outlined">
                    add_shopping_cart
                </span>
                Add new Product
            </a>
        </x-button>
    </div>
    <table class="table mb-1">
        <tbody>
            <tr>
                <th>Supplier Name</th>
                <td>{{ $supplier->name }}</td>
            </tr>
            <tr>
                <th>Supplier FullName</th>
                <td>{{ $supplier->fullname }}</td>
            </tr>
            <tr>
                <th>Supplier Country</th>
                <td>{{ $supplier->country->name }}</td>
            </tr>
            <tr>
                <th>Products</th>
                <td>
                    @foreach ($supplier->products as $product)
                        <a href="/products/{{ $product->id }}">{{ $product->part_number }}</a>
                        ,<br>
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>
    <x-button>
        <a href="/suppliers/{{ $supplier->id }}/edit">
            <span class="material-symbols-outlined">
                edit
            </span>
            Edit
        </a>
    </x-button>
@endSection
