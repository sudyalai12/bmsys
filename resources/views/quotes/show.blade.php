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

    <div class="quote-preview">
        <table>
            <tr>
                <td><strong>REF: {{ $quote->reference }}</strong></td>
                <td class="text-right"><strong>DATE: {{ date('d/m/Y') }}</strong></td>
            </tr>
            <tr>
                <td><strong>{{ Str::upper($quote->contact->customer->name) }}</strong></td>
                <td><strong>Enquiry REF: Email Dated: {{ date('d/m/Y', strtotime($quote->enquiry_date)) }}</strong></td>
            </tr>
            <tr>
                <td>{{ $quote->contact->address->address1 }}</td>
                <td><strong>Enquiry Date: <input value="{{ $quote->enquiry_date }}" id="enquiry_date" type="date"></strong>
                </td>
            </tr>
            <tr>
                <td>{{ $quote->contact->address->address2 }}</td>
                <td><strong>DUE DATE: <input value="{{ $quote->due_date }}" id="due_date" type="date"></strong></td>
            </tr>
            <tr>
                <td>{{ $quote->contact->address->city }}-{{ $quote->contact->address->pincode }},
                    {{ $quote->contact->address->state->name }}, {{ $quote->contact->address->country->name }}</td>
                <td></td>
            </tr>
            <tr>
                <td>Phone: {{ $quote->contact->phone }}, Mobile: {{ $quote->contact->mobile }}</td>
                <td></td>
            </tr>
            <tr>
                <td><a href="">E-mail: {{ $quote->contact->email }}</a></td>
                <td></td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="underline italic"><strong>KIND ATTN: {{ Str::upper($quote->contact->name) }},
                        {{ Str::upper($quote->contact->department) }}</strong></td>
            </tr>
        </table>
    </div>

    <div class="form-box">
        <form method="POST" class="form quote-form" action="/quotes/{{ $quote->id }}">
            @csrf
            <div class="form-header">
                <h1>Add Item</h1>
            </div>
            <div class="form-block">
                <x-form.field class="fb-100">
                    <x-form.label for="supplier">Select Supplier</x-form.label>
                    <x-form.input placeholder="Enter Supplier Name" id="supplier" type="text" name="supplier"
                        value="{{ old('supplier') == '' ? 'All Suppliers' : old('supplier') }}" />
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
                    <td><a href="/products/{{ $item->product->id }}">{{ $item->product->part_number }}</a></td>
                    <td>{{ $item->product->description }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->product->sale_price, 2) }}</td>
                    <td>{{ number_format($item->total(), 2) }}</td>
                    <td>{{ number_format($item->tax(), 2) }}</td>
                    <td>{{ number_format($item->total() + $item->tax(), 2) }}</td>
                    <td>
                        <x-button btntype="danger" type="submit" form="delete-form-{{ $item->id }}">Remove</x-button>
                        <form id="delete-form-{{ $item->id }}"
                            action="/quotes/{{ $quote->id }}/items/{{ $item->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <th></th>
                <th>TOTALS:</th>
                <th>SUM OF QUOTED ITEMS</th>
                <th>{{ $quote->quoteItems->sum('quantity') }}</th>
                <th></th>
                <th>{{ number_format($quote->total(), 2) }}</th>
                <th>{{ number_format($quote->tax(), 2) }}</th>
                <th>{{ number_format($quote->total() + $quote->tax(), 2) }}</th>
                <th></th>
            </tr>
        </tbody>
    </x-table>
    <div class="floating-panel">
        <x-button btntype="warning"><a href="/quotes/{{ $quote->id }}/pdf" target="_blank"><span class="material-symbols-outlined">
            picture_as_pdf
            </span>Generate Quote
                PDF</a></x-button>
        <x-button btntype="success"><a href="" target=""><span class="material-symbols-outlined">
            mail
            </span>Whatsapp Quote</a></x-button>
    </div>
    <div class="form-box">
        <form id="update-quote-form" method="POST" class="form quote-form" action="/quotes/{{ $quote->id }}/update">
            @csrf
            <div class="form-block">

                <x-form.field class="fb-800">
                    <x-form.label for="price_basic_term">Price Basis</x-form.label>
                    <select name="price_basic_term" id="price_basic_term">
                        @foreach ($priceBasicTerms as $priceBasicTerm)
                            <option @if ($quote->priceBasicTerm->description == $priceBasicTerm) selected @endif value="{{ $priceBasicTerm }}">
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
                            <option @if ($quote->paymentTerm->description == $paymentTerm) selected @endif value="{{ $paymentTerm }}">
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
                            <option @if ($quote->handlingChargesTerm->description == $handlingChargesTerm) selected @endif value="{{ $handlingChargesTerm }}">
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
                            <option @if ($quote->gstTerm->description == $gstTerm) selected @endif value="{{ $gstTerm }}">
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
                            <option @if ($quote->deliveryTerm->description == $deliveryTerm) selected @endif value="{{ $deliveryTerm }}">
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
                            <option @if ($quote->pnfChargesTerm->description == $pnfChargesTerm) selected @endif value="{{ $pnfChargesTerm }}">
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
                            <option @if ($quote->freightChargesTerm->description == $freightChargesTerm) selected @endif value="{{ $freightChargesTerm }}">
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
                            <option @if ($quote->warrantyTerm->description == $warrantyTerm) selected @endif value="{{ $warrantyTerm }}">
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
                            <option @if ($quote->validityQuoteTerm->description == $validityQuoteTerm) selected @endif value="{{ $validityQuoteTerm }}">
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
                            <option @if ($quote->poConditionsTerm->description == $poConditionsTerm) selected @endif value="{{ $poConditionsTerm }}">
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
                            <option @if ($quote->specialConditionsTerm->description == $specialConditionsTerm) selected @endif
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
