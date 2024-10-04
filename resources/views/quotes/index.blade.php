@extends('layouts.app')
@section('content')
    {{-- {{ $quotes }} --}}
    <h1 class="heading">Quotes</h1>
    <div class="floating-panel">
        <x-button class="quotes" btntype="secondary">
            <a href="/quotes/create">
                <span class="material-symbols-outlined">
                    note_add
                </span>
                Add new Quote
            </a>
        </x-button>
    </div>
    <x-table>
        <thead class="quotes">
            <tr>
                <th>QID</th>
                <th>ReferenceNo</th>
                <th>CustomerNick</th>
                <th>ContactPersonName</th>
                <th>EnquiryDate</th>
                <th>DueDate</th>
                <th>EnquiryRef</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($quotes as $quote)
                <tr>
                    <td><a href="/quotes/{{ $quote->id }}">{{ $quote->id }}</a></td>
                    <td><a href="/quotes/{{ $quote->id }}">{{ $quote->reference }}</a></td>
                    <td><a
                            href="/customers/{{ $quote->enquiry->contact->customer->id }}">{{ $quote->enquiry->contact->customer->nickname }}</a>
                    </td>
                    <td><a href="/contacts/{{ $quote->enquiry->contact->id }}">{{ $quote->enquiry->contact->name }}</a></td>
                    <td>{{ $quote->enquiry->date }}</td>
                    <td>{{ $quote->enquiry->due_date }}</td>
                    <td>{{ $quote->enquiry->reference }}</td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
@endSection
