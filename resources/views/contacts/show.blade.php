@extends('layouts.app')
@section('content')
    {{-- {{ $contact }} --}}
    <h1 class="heading">Contact Person Details</h1>
    <div class="floating-panel">
        <x-button class="contacts" btntype="secondary">
            <a href="/customers/create">
                <span class="material-symbols-outlined">
                    person_add
                </span>
                Add new Customer
            </a>
        </x-button>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <img src="{{ url('images/profile.png') }}" alt="">
                <div class="card-title-text">
                    <h3>{{ $contact->name }}</h3>
                    <span>{{ $contact->department }}</span>
                </div>
            </div>
            <div class="card-details">
                <h3><a href="/customers/{{ $contact->customer->id }}">{{ $contact->customer->name }}</a></h3>
                <span>{{ $contact->customer->address->address1 }}</span><br>
                <span>{{ $contact->customer->address->address2 }}</span><br>
                <span>{{ $contact->customer->address->city }}, {{ $contact->customer->address->state->name }}</span>-
                <span>{{ $contact->customer->address->pincode }}</span>
                <span>{{ $contact->customer->address->country->name }}</span><br>
                Phone: <span><a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></span>, Mobile: 
                <span><a href="tel:{{ $contact->mobile }}">{{ $contact->mobile }}</a></span><br>
                E-mail: <span><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></span>
            </div>
        </div>
    </div>

    <x-button>
        <a href="/contacts/{{ $contact->id }}/edit">
            <span class="material-symbols-outlined">
                edit
            </span>
            Edit
        </a>
    </x-button>
    <x-button btntype="secondary" class="quotes">
        <a href="/quotes/create?contact={{ $contact->id }}">
            <span class="material-symbols-outlined">
                note_add
            </span>
            Quote
        </a>
    </x-button>
@endSection
