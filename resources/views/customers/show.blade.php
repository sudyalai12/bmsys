@extends('layouts.app')
@section('content')
    {{-- {{ $customer }} --}}
    <h1 class="heading">Customer Details</h1>
    <div class="floating-panel">
        <x-button btntype="secondary" class="customers">
            <a href="/customers/create">
                <span class="material-symbols-outlined">
                    person_add
                </span>
                Add new Customer
            </a>
        </x-button>
    </div>

    <div class="card">
        @foreach ($customer->contacts as $contact)
            <div class="card-body">
                <div class="card-title">
                    <img src="{{ url('images/profile.png') }}" alt="">
                    <div class="card-title-text">
                        <h3><a href="/contacts/{{ $contact->id }}">{{ $contact->name }}</a></h3>
                        <span>{{ $contact->department }}</span>
                    </div>
                </div>
                <div class="card-details">
                    <h3>{{ $customer->name }}</h3>
                    <span>{{ $customer->address->address1 }}</span><br>
                    <span>{{ $customer->address->address2 }}</span><br>
                    <span>{{ $customer->address->city }}, {{ $customer->address->state->name }}</span>-
                    <span>{{ $customer->address->pincode }}</span>
                    <span>{{ $customer->address->country->name }}</span><br>
                    Phone: <span><a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></span>, Mobile:
                    <span><a href="tel:{{ $contact->mobile }}">{{ $contact->mobile }}</a></span><br>
                    E-mail: <span><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></span>
                </div>
            </div>
        @endforeach
    </div>

    <x-button>
        <a href="/customers/{{ $customer->id }}/edit">
            <span class="material-symbols-outlined">
                edit
            </span>
            Edit
        </a>
    </x-button>
@endSection
