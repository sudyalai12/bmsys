@php
    function formatString($string)
    {
        return preg_replace('/;/', "\r\n•", $string);
    }
@endphp

@extends('layouts.app')
@section('content')
    <h1 class="heading">Product Details</h1>
    <div class="floating-panel">
        <x-button class="products" btntype="secondary">
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
                <th>Part Number</th>
                <td>{{ $product->part_number }}</td>
            </tr>
            <tr>
                <th>Supplier / Country</th>
                <td><a href="/suppliers/{{ $product->supplier->id }}">{{ $product->supplier->name }}</a>
                    /
                    {{ $product->supplier->country->name }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td style="white-space: pre-wrap;">@php echo formatString($product->description);@endphp</td>
            </tr>
            <tr>
                <th>UnitPrice(INR)</th>
                <td>{{ number_format($product->unit_price, 2) }}</td>
            </tr>
            <tr>
                <th>PurchasePrice(INR)</th>
                <td>{{ number_format($product->purchase_price, 2) }}</td>
            </tr>
            <tr>
                <th>SalePrice(INR)</th>
                <td>{{ number_format($product->sale_price, 2) }}</td>
            </tr>
            <tr>
                <th>HSNCode</th>
                <td>{{ $product->hsn_code }}</td>
            </tr>
        </tbody>
    </table>
    <x-button><a href="/products/{{ $product->id }}/edit"><span class="material-symbols-outlined">
                edit
            </span>Edit</a></x-button>
@endSection
