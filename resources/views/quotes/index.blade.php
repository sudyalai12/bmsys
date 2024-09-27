@extends('layouts.app')
@section('content')
    {{-- {{ $quotes }} --}}
    <h1 class="heading">Quotes</h1>
    <x-button class="quotes" btntype="secondary"><a href="/quotes/create">Add new Quote</a></x-button>
    <x-table>
        <thead class="quotes">
            <tr>
                <th>QID</th>
                <th>ReferenceNo</th>
                <th>CustomerNick</th>
                <th>ContactPersonName</th>
                <th>EnquiryDate</th>
                <th>DueDate</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($quotes as $quote)
                <tr>
                    <td><a href="/quotes/{{ $quote->id }}">{{ $quote->id }}</a></td>
                    <td><a href="/quotes/{{ $quote->id }}">{{ $quote->reference }}</a></td>
                    <td><a href="/customers/{{ $quote->contact->customer->id }}">{{ $quote->contact->customer->nickname }}</a></td>
                    <td><a href="/contacts/{{ $quote->contact->id }}">{{ $quote->contact->name }}</a></td>
                    <td>{{ $quote->enquiry_date }}</td>
                    <td>{{ $quote->due_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
@endSection
