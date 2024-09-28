@extends('layouts.app')
@section('content')
    {{-- {{ $products }} --}}
    <h1 class="heading">Products</h1>
    <div class="floating-panel">
        <x-button class="products" btntype="secondary"><a href="/products/create"><span class="material-symbols-outlined">
                    add_shopping_cart
                </span>Add new Product</a></x-button>
    </div>
    <x-table>
        <thead class="products">
            <tr>
                <th>ProdID</th>
                <th>PartNo</th>
                <th>Supplier</th>
                <th>Desc</th>
                <th>UnitPrice(INR)</th>
                <th>PurchasePrice(INR)</th>
                <th>SalePrice(INR)</th>
                <th>HSNCode</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td><a href="/products/{{ $product->id }}">{{ $product->id }}</a></td>
                    <td><a href="/products/{{ $product->id }}">{{ $product->part_number }}</a></td>
                    <td><a href="/suppliers/{{ $product->supplier->id }}">{{ $product->supplier->name }}</a></td>
                    <td>{{ $product->description }}</td>
                    <td>{{ number_format($product->unit_price, 2) }}</td>
                    <td>{{ number_format($product->purchase_price, 2) }}</td>
                    <td>{{ number_format($product->sale_price, 2) }}</td>
                    <td>{{ $product->hsn_code }}</td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
@endSection
