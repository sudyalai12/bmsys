@extends('layouts.app')

@section('content')
    {{-- {{ $customers }} --}}
    <h1 class="heading">Dashboard</h1>

    <div class="panels-container">
        <div class="panels">
            <h2>Quick Access Panels</h2>
            <div class="panel-items">
                <x-button btntype="secondary" class="customers">
                    <a href="/customers/create">
                        <span class="material-symbols-outlined">
                            person_add
                        </span>
                        Add new Customer
                    </a>
                </x-button>
                <x-button btntype="secondary" class="customers">
                    <a href="/customers">
                        <span class="material-symbols-outlined">
                            visibility
                        </span>
                        View Customers
                    </a>
                </x-button>
                <x-button class="products" btntype="secondary">
                    <a href="/products/create">
                        <span class="material-symbols-outlined">
                            add_shopping_cart
                        </span>
                        Add new Product
                    </a>
                </x-button>
                <x-button class="products" btntype="secondary">
                    <a href="/products">
                        <span class="material-symbols-outlined">
                            visibility
                        </span>
                        View Products
                    </a>
                </x-button>
                <x-button class="quotes" btntype="secondary">
                    <a href="/quotes/create">
                        <span class="material-symbols-outlined">
                            note_add
                        </span>
                        Add new Quote
                    </a>
                </x-button>
                <x-button class="suppliers" btntype="secondary">
                    <a href="/suppliers">
                        <span class="material-symbols-outlined">
                            visibility
                        </span>
                        View Suppliers
                    </a>
                </x-button>
            </div>
        </div>
        <div class="panels customers">
            <h2>Recent Customers</h2>

            <ul class="panel-list">
                @foreach ($customers as $customer)
                    <li>
                        <span class="material-symbols-outlined">
                            person
                        </span>
                        <a href="/customers/{{ $customer->id }}">{{ $customer->nickname }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="panels products">
            <h2>Recent Products</h2>

            <ul class="panel-list">
                @foreach ($products as $product)
                    <li>
                        <span class="material-symbols-outlined">
                            inventory_2
                        </span>
                        <a href="/products/{{ $product->id }}">{{ $product->part_number }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="panels quotes">
            <h2>Recent Quotes</h2>

            <ul class="panel-list">
                @foreach ($quotes as $quote)
                    <li>
                        <span class="material-symbols-outlined">
                            request_quote
                        </span>
                        <a href="/quotes/{{ $quote->id }}">{{ $quote->reference }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
