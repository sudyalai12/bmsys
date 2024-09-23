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
    <x-table class="mb-1">
        <tbody>
            <tr>
                <th>Customer Name</th>
                <td>
                    <a href="/customers/{{ $quote->contact->customer->id }}">{{ $quote->contact->customer->name }}
                    </a>
                </td>
                <th>Contact Person Name</th>
                <td><a href="/contacts/{{ $quote->contact->id }}">{{ $quote->contact->name }}</a></td>
                <th>Department Name</th>
                <td>{{ $quote->contact->department }}</td>
            </tr>
            <tr>
                <th>Address1</th>
                <td>{{ $quote->contact->address->address1 }}</td>
                <th>Address2</th>
                <td>{{ $quote->contact->address->address2 }}</td>
                <th>City</th>
                <td>{{ $quote->contact->address->city }}</td>
            </tr>
            <tr>
                <th>Pincode</th>
                <td>{{ $quote->contact->address->pincode }}</td>
                <th>State/Country</th>
                <td>{{ $quote->contact->address->state->name }}/ {{ $quote->contact->address->country->name }}</td>
                <th>Phone</th>
                <td>{{ $quote->contact->phone }}</td>
            </tr>
            <tr>
                <th>Mobile</th>
                <td>{{ $quote->contact->mobile }}</td>
                <th>Email</th>
                <td><a href="mailto:{{ $quote->contact->email }}">{{ $quote->contact->email }}</a></td>
                <th>Tax Type</th>
                <td>{{ $quote->contact->customer->tax_type }}</td>
            </tr>
            <tr>
                <th>GST Number</th>
                <td>{{ $quote->contact->customer->gstn }}</td>
                <th>PAN</th>
                <td>{{ $quote->contact->customer->pan }}</td>
                <th>State Code</th>
                <td>{{ $quote->contact->customer->state_code }}</td>
            </tr>
            <tr>
                <th>Customer Nickname</th>
                <td>{{ $quote->contact->customer->nickname }}</td>
                <th>Due Date</th>
                <td><input value="{{ $quote->due_date }}" id="due_date" type="date"></td>
                <th>Enquiry Date</th>
                <td><input value="{{ $quote->enquiry_date }}" id="enquiry_date" type="date"></td>
            </tr>
        </tbody>
    </x-table>

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
                <x-button btntype="secondary" type="submit">Add</x-button>
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
    <x-button btntype="warning"><a href="/quotes/{{ $quote->id }}/pdf" target="_blank">Generate Quote
            PDF</a></x-button>
    <br><br>
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

                {{-- <x-form.field class="fb-800">
                    <x-form.label for="po_place_term">PO to Place</x-form.label>
                    <select name="" id="">
                        <option title="Hindi" value="hi">bye</option>
                    </select>
                    <x-form.error name="po_place_term" />
                </x-form.field> --}}

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
            </div>
        </form>
    </div>
@endSection
