@extends('layouts.app')
@section('content')
    <h1 class="heading">Product Details</h1>
    <table class="table mb-1">
        <tbody>
            <tr>
                <th>Part Number</th>
                <td>{{ $product->part_number }}</td>
            </tr>
            <tr>
                <th>Supplier / Country</th>
                <td>{{ $product->supplier->name }} / {{ $product->supplier->country->name }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $product->description }}</td>
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
    <x-button><a href="/products/{{ $product->id }}/edit">Edit</a></x-button>
@endSection
