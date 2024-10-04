@extends('layouts.app')
@section('css')
    <style>
        #update-quote-form .form-field {
            flex-direction: row;
        }

        #update-quote-form .form-label {
            font-size: 0.8rem;
            font-weight: 600;
            color: rgba(255, 255, 255);
            width: 14%;
            background-color: #6C757D;
            display: flex;
            align-items: center;
            justify-content: left;
            padding: 0 4px
        }

        #update-quote-form .autocomplete-items {
            left: 12.5%;
        }

        #update-quote-form .form-input {
            background-color: rgba(0, 0, 0, 0.05);
        }
    </style>
@endsection
@php
    $index = 1;
@endphp
@section('content')
    {{-- {{ $quote }} --}}
    {{-- {{ $quote->quoteItems }} --}}
    <div class="pdf-preview-box">
        <span id="close-pdf-preview" class="material-symbols-outlined">
            close
        </span>
        <embed src="" type="application/pdf">
    </div>
    <div class="floating-panel">
        <x-button btntype="primary">
            <a id="preview-pdf" href="/quotes/{{ $quote->id }}/pdf" target="_blank">
                <span class="material-symbols-outlined">
                    picture_as_pdf
                </span>
                View Quote
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
    </div>
    <div class="quote-preview">
        <table>
            <tr>
                <td><strong>REF: {{ $quote->reference }}</strong></td>
                <td class="text-right"><strong>DATE: <input type="date" id="quote_date"
                            value="{{ $quote->date }}"></strong></td>
            </tr>
            <tr>
                <td><strong><a
                            href="/customers/{{ $quote->enquiry->contact->customer->id }}">{{ Str::upper($quote->customer_name) }}</a></strong>
                </td>
                <td><strong>Enquiry REF: <input type="text" id="enquiry_ref"
                            value="{{ $quote->enquiry->reference }}"></strong></td>
            </tr>
            <tr>
                <td>{{ $quote->address1 }}</td>
                <td><strong>Enquiry Date: <input value="{{ $quote->enquiry->date }}" id="enquiry_date"
                            type="date"></strong>
                </td>
            </tr>
            <tr>
                <td>{{ $quote->address2 }}</td>
                <td><strong class="danger-text">DUE DATE: <input value="{{ $quote->enquiry->due_date }}" id="due_date"
                            type="date"></strong></td>
            </tr>
            <tr>
                <td>{{ $quote->city }}-{{ $quote->pincode }},
                    {{ $quote->state->name }},
                    {{ $quote->country->name }}</td>
                <td></td>
            </tr>
            <tr>
                <td>Phone: {{ $quote->phone }}, Mobile: {{ $quote->mobile }}</td>
                <td></td>
            </tr>
            <tr>
                <td><a href="">E-mail: {{ $quote->email }}</a></td>
                <td></td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="underline italic"><strong>KIND ATTN: {{ Str::upper($quote->contact_name) }},
                        {{ Str::upper($quote->department) }}</strong></td>
            </tr>
        </table>
    </div>

    <div class="form-box">
        <form method="POST" class="form quote-form" action="/quotes/{{ $quote->id }}/items">
            @csrf
            <div class="form-header">
                <h1>Add Item</h1>
            </div>
            <div class="form-block">
                <x-form.field class="fb-100">
                    <x-form.label for="supplier">Select Supplier</x-form.label>
                    <x-form.input placeholder="Enter Supplier Name" id="supplier" type="text" name="supplier"
                        value="{{ old('supplier') }}" />
                    <x-form.error name="supplier" />
                </x-form.field>
                <x-form.field class="fb-100">
                    <x-form.label for="part_number">Select Product</x-form.label>
                    <x-form.input placeholder="Enter Product Part Number" id="part_number" type="text" name="part_number"
                        value="{{ old('part_number') }}" />
                    <x-form.error name="part_number" />
                </x-form.field>
                <x-form.field class="fb-100">
                    <x-form.label for="quantity">Quantity</x-form.label>
                    <x-form.input placeholder="Enter Quantity" id="quantity" type="number" name="quantity" value="1"
                        min="1" />
                    <x-form.error name="quantity" />
                </x-form.field>
            </div>

            <div class="text-center">
                <x-button btntype="secondary" class="quotes" type="submit">Add</x-button>
            </div>
        </form>
    </div>

    <x-table class="quote-table">
        <thead>
            <tr>
                <th>SNo</th>
                <th>PartNumber</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>UnitPrice(INR)</th>
                <th>TaxbleAmount(INR)</th>
                <th>GST(INR)</th>
                <th>TotalAmount(INR)</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($quote->quoteItems as $item)
                <tr>
                    <td>{{ $index++ }}</td>
                    <td><a href="/products/{{ $item->product->id }}">{{ $item->part_number }}</a></td>
                    <td>{{ $item->description }}</td>
                    <td class="text-center">
                        <form action="/quotes/{{ $quote->id }}/items/{{ $item->id }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input style="width: 60px;" type="number" name="quantity"
                                class="item-quantity" value="{{ $item->quantity }}">
                        </form>
                    </td>
                    <td>{{ number_format($item->sale_price, 2) }}</td>
                    <td>{{ number_format($item->totalFixed(), 2) }}</td>
                    <td>{{ number_format($item->taxAmountFixed(), 2) }}</td>
                    <td>{{ number_format($item->totalFixed() + $item->taxAmountFixed(), 2) }}</td>
                    <td>
                        <form id="delete-form-{{ $item->id }}"
                            action="/quotes/{{ $quote->id }}/items/{{ $item->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-button btntype="danger" type="submit"
                                form="delete-form-{{ $item->id }}">Remove</x-button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <th></th>
                <th>TOTALS:</th>
                <th>SUM OF QUOTED ITEMS</th>
                <th class="text-center">{{ $quote->quoteItems->sum('quantity') }}</th>
                <th></th>
                <th>{{ number_format($quote->totalFixed(), 2) }}</th>
                <th>{{ number_format($quote->taxAmountFixed(), 2) }}</th>
                <th>{{ number_format($quote->totalFixed() + $quote->taxAmountFixed(), 2) }}</th>
                <th></th>
            </tr>
        </tbody>
    </x-table>

    <div class="form-box">
        <form id="update-quote-form" method="POST" class="form quote-form" action="/quotes/{{ $quote->id }}">
            @csrf
            @method('PATCH')
            <div class="form-block">

                <x-form.field class="fb-800">
                    <x-form.label for="price_basic_term">Price Basis</x-form.label>
                    <select name="price_basic_term" id="price_basic_term">
                        @foreach ($priceBasicTerms as $priceBasicTerm)
                            <option @if ($quote->price_basic_term == $priceBasicTerm) selected @endif value="{{ $priceBasicTerm }}">
                                {{ $priceBasicTerm }}
                            </option>
                        @endforeach
                    </select>
                    <x-form.error name="price_basic_term" />
                </x-form.field>

                <x-form.field class="fb-800">
                    <x-form.label for="payment_term">Payment Terms</x-form.label>
                    <select name="payment_term" id="payment_term">
                        @foreach ($paymentTerms as $paymentTerm)
                            <option @if ($quote->payment_term == $paymentTerm) selected @endif value="{{ $paymentTerm }}">
                                {{ $paymentTerm }}
                            </option>
                        @endforeach
                    </select>
                    <x-form.error name="payment_term" />
                </x-form.field>

                <x-form.field class="fb-800">
                    <x-form.label for="handling_charges_term">Handling Charges</x-form.label>
                    <select name="handling_charges_term" id="handling_charges_term">
                        @foreach ($handlingChargesTerms as $handlingChargesTerm)
                            <option @if ($quote->handling_charges_term == $handlingChargesTerm) selected @endif value="{{ $handlingChargesTerm }}">
                                {{ $handlingChargesTerm }}
                            </option>
                        @endforeach
                    </select>
                    <x-form.error name="handling_charges_term" />
                </x-form.field>

                <x-form.field class="fb-800">
                    <x-form.label for="gst_term">GST/IGST</x-form.label>
                    <select name="gst_term" id="gst_term">
                        @foreach ($gstTerms as $gstTerm)
                            <option @if ($quote->gst_term == $gstTerm) selected @endif value="{{ $gstTerm }}">
                                {{ $gstTerm }}
                            </option>
                        @endforeach
                    </select>
                    <x-form.error name="gst_term" />
                </x-form.field>

                <x-form.field class="fb-800">
                    <x-form.label for="delivery_term">Delivery</x-form.label>
                    <select name="delivery_term" id="delivery_term">
                        @foreach ($deliveryTerms as $deliveryTerm)
                            <option @if ($quote->delivery_term == $deliveryTerm) selected @endif value="{{ $deliveryTerm }}">
                                {{ $deliveryTerm }}
                            </option>
                        @endforeach
                    </select>
                    <x-form.error name="delivery_term" />
                </x-form.field>

                <x-form.field class="fb-800">
                    <x-form.label for="pnf_charges_term">PNF Charges</x-form.label>
                    <select name="pnf_charges_term" id="pnf_charges_term">
                        @foreach ($pnfChargesTerms as $pnfChargesTerm)
                            <option @if ($quote->pnf_charges_term == $pnfChargesTerm) selected @endif value="{{ $pnfChargesTerm }}">
                                {{ $pnfChargesTerm }}
                            </option>
                        @endforeach
                    </select>
                    <x-form.error name="pnf_charges_term" />
                </x-form.field>

                <x-form.field class="fb-800">
                    <x-form.label for="freight_charges_term">Freight Charges</x-form.label>
                    <select name="freight_charges_term" id="freight_charges_term">
                        @foreach ($freightChargesTerms as $freightChargesTerm)
                            <option @if ($quote->freight_charges_term == $freightChargesTerm) selected @endif value="{{ $freightChargesTerm }}">
                                {{ $freightChargesTerm }}
                            </option>
                        @endforeach
                    </select>
                    <x-form.error name="freight_charges_term" />
                </x-form.field>

                <x-form.field class="fb-800">
                    <x-form.label for="warranty_term">Warranty</x-form.label>
                    <select name="warranty_term" id="warranty_term">
                        @foreach ($warrantyTerms as $warrantyTerm)
                            <option @if ($quote->warranty_term == $warrantyTerm) selected @endif value="{{ $warrantyTerm }}">
                                {{ $warrantyTerm }}
                            </option>
                        @endforeach
                    </select>
                    <x-form.error name="warranty_term" />
                </x-form.field>

                <x-form.field class="fb-800">
                    <x-form.label for="validity_quote_term">Validity of Quote</x-form.label>
                    <select name="validity_quote_term" id="validity_quote_term">
                        @foreach ($validityQuoteTerms as $validityQuoteTerm)
                            <option @if ($quote->validity_quote_term == $validityQuoteTerm) selected @endif value="{{ $validityQuoteTerm }}">
                                {{ $validityQuoteTerm }}
                            </option>
                        @endforeach
                    </select>
                    <x-form.error name="validity_quote_term" />
                </x-form.field>

                <x-form.field class="fb-800">
                    <x-form.label for="po_conditions_term">PO Conditions</x-form.label>
                    <select name="po_conditions_term" id="po_conditions_term">
                        @foreach ($poConditionsTerms as $poConditionsTerm)
                            <option @if ($quote->po_conditions_term == $poConditionsTerm) selected @endif value="{{ $poConditionsTerm }}">
                                {{ $poConditionsTerm }}
                            </option>
                        @endforeach
                    </select>
                    <x-form.error name="po_conditions_term" />
                </x-form.field>

                <x-form.field class="fb-800">
                    <x-form.label for="special_conditions_term">Special Conditions</x-form.label>
                    <select name="special_conditions_term" id="special_conditions_term">
                        @foreach ($specialConditionsTerms as $specialConditionsTerm)
                            <option @if ($quote->special_conditions_term == $specialConditionsTerm) selected @endif
                                value="{{ $specialConditionsTerm }}">
                                {{ $specialConditionsTerm }}
                            </option>
                        @endforeach
                    </select>
                    <x-form.error name="special_conditions_term" />
                </x-form.field>
            </div>
        </form>
    </div>
@endSection
