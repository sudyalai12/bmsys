@extends('layouts.app')
@section('content')
    {{-- {{ $products }} --}}
    <h1 class="heading">Products</h1>
    <x-button btntype="secondary"><a href="/products/create">Add new Product</a></x-button>
    <x-table>
        <thead>
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
                    <td>{{ $product->part_number }}</td>
                    <td>{{ $product->supplier->name }}</td>
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
