<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Country;
use App\Models\Customer;
use App\Models\DeliveryTerm;
use App\Models\FreightChargesTerm;
use App\Models\GstTerm;
use App\Models\HandlingChargesTerm;
use App\Models\PaymentTerm;
use App\Models\PnfChargesTerm;
use App\Models\PriceBasicTerm;
use App\Models\Product;
use App\Models\State;
use App\Models\Supplier;
use App\Models\Tax;
use App\Models\ValidityQuoteTerm;
use App\Models\WarrantyTerm;
use Illuminate\Http\Request;

class AutocompleteController extends Controller
{
    function fetch(Request $request): \Illuminate\Http\JsonResponse
    {
        $column = $request->get('column');
        $search = $request->get('search');
        $customer = $request->get('customer');
        $supplier = $request->get('supplier');
        $country = $request->get('country');

        $data = match ($column) {
            'customer' => Customer::where('name', 'LIKE', "$search%")
                ->select('name')
                ->orderBy('name')
                ->get()
                ->pluck('name'),
            'contact' => Contact::whereHas('customer', fn($q) => $q->where('name', $customer))
                ->select('name')
                ->orderBy('name')
                ->get()
                ->pluck('name'),
            'country', 'supplier_country' => Country::where('name', 'LIKE', "$search%")
                ->select('name')
                ->orderBy('name')
                ->get()
                ->pluck('name'),
            'state' => State::whereHas('country', fn($q) => $q->where('name', $country))
                ->select('name')
                ->orderBy('name')
                ->get()
                ->pluck('name'),
            'tax_type' => Tax::select('type')
                ->get()
                ->pluck('type'),
            'supplier' => Supplier::select('name')
                ->get()
                ->pluck('name')
                ->prepend('-'),
            'part_number' => Product::whereHas('supplier', function ($q) use ($supplier) {
                $q->when($supplier != "" && $supplier != "-" && $supplier != "All Suppliers", function ($q) use ($supplier) {
                    $q->where('name', $supplier);
                });
            })->select('part_number')
                ->where('part_number', 'LIKE', "$search%")
                ->orderBy('part_number')
                ->get()
                ->pluck('part_number'),
            default => []
        };
        return response()->json($data);
    }

    function fetchDetails(Request $request)
    {
        $contact = $request->get('contact');
        $customer = $request->get('customer');
        $supplier = $request->get('supplier');
        if ($request->get('customer')) {
            $customer = Customer::where('name', $request->get('customer'))->first();
            if ($customer) {
                $contact = $customer->contacts()->first();
            }
        } elseif ($request->get('contact')) {
            $contact = Contact::where('name', $request->get('contact'))->first();
        } elseif ($request->get('supplier')) {
            $supplier = Supplier::where('name', $request->get('supplier'))->first();
        }

        $data = [
            'customer' => $contact->customer->name ?? null,
            'nickname' => $contact->customer->nickname ?? null,
            'email' => $contact->email ?? null,
            'contact' => $contact->name ?? null,
            'department' => $contact->department ?? null,
            'address1' => $contact->address->address1 ?? null,
            'address2' => $contact->address->address2 ?? null,
            'city' => $contact->address->city ?? null,
            'pincode' => $contact->address->pincode ?? null,
            'state' => $contact->address->state ?? null,
            'country' => $contact->address->country ?? null,
            'phone' => $contact->phone ?? null,
            'mobile' => $contact->mobile ?? null,
            'tax_type' => $contact->customer->tax_type ?? null,
            'gstn' => $contact->customer->gstn ?? null,
            'pan' => $contact->customer->pan ?? null,
            'state_code' => $contact->customer->state_code ?? null,
            'supplier' => $supplier->name ?? null,
            'supplier_country' => $supplier->country ?? null,
            // 'part_number' => $supplier?->products->first()?->part_number ?? null,
            // 'description' => $supplier?->products->first()?->description ?? null,
            // 'hsn_code' => $supplier?->products->first()?->hsn_code ?? null,
            // 'sale_price' => $supplier?->products->first()?->sale_price ?? null,
            // 'unit_price' => $supplier?->products->first()?->unit_price ?? null,
            // 'purchase_price' => $supplier?->products->first()?->purchase_price ?? null,
        ];

        return response()->json($data);
    }
}
