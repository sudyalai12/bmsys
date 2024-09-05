<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Department;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Tax;
use Illuminate\Http\Request;

class AutocompleteController extends Controller
{
    function fetch(Request $request): \Illuminate\Http\JsonResponse
    {
        $column = $request->get('column');
        $search = $request->get('search');
        $customer = $request->get('customer');
        $supplier = $request->get('supplier');

        $data = match ($column) {
            'customer' => Customer::where('name', 'LIKE', "$search%")
                ->select('name')
                ->orderBy('name')
                ->get()
                ->pluck('name'),
            'contact' => Contact::whereHas('address.customer', fn($q) => $q->where('name', $customer))
                ->select('name')
                ->orderBy('name')
                ->get()
                ->pluck('name'),
            'department' => Department::where('name', 'LIKE', "$search%")
                ->select('name')
                ->orderBy('name')
                ->get()
                ->pluck('name'),
            'country', 'supplier_country' => Country::where('name', 'LIKE', "$search%")
                ->select('name')
                ->orderBy('name')
                ->get()
                ->pluck('name'),
            'tax_type' => Tax::select('type')
                ->get()
                ->pluck('type'),
            'address1' => Address::whereHas('customer', fn($q) => $q->where('name', $customer))
                ->select('address1')
                ->orderBy('address1')
                ->get()
                ->pluck('address1'),
            'supplier' => Supplier::where('name', 'LIKE', "$search%")
                ->select('name')
                ->orderBy('name')
                ->get()
                ->pluck('name')
                ->prepend('All Suppliers'),
            'part_number' => Product::whereHas('supplier', function ($q) use ($supplier) {
                $q->when($supplier != 'All Suppliers', function ($q) use ($supplier) {
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
        if ($request->get('customer')) {
            $customer = Customer::where('name', $request->get('customer'))->first();
            if ($customer) {
                $addresses = $customer->addresses()->get();
                if ($addresses->count() > 0) {
                    foreach ($addresses as $address) {
                        $contact = $address->contacts()->first();
                        if ($contact) {
                            break;
                        }
                    }
                }
            }
        } elseif ($request->get('contact')) {
            $contact = Contact::where('name', $request->get('contact'))->first();
        } elseif ($request->get('address')) {
            $address = Address::where('address1', $request->get('address'))->first();
            $contact = $address->contacts()->first();
        } elseif ($request->get('supplier')) {
            $supplier = Supplier::where('name', $request->get('supplier'))->first();
            if ($supplier) {
                $supplier_country = $supplier->country->name;
            }
        }

        $data = [
            'customer' => $contact->address->customer->name ?? null,
            'nickname' => $contact->address->customer->nickname ?? null,
            'email' => $contact->email ?? null,
            'contact' => $contact->name ?? null,
            'department' => $contact->department->name ?? null,
            'address1' => $contact->address->address1 ?? null,
            'address2' => $contact->address->address2 ?? null,
            'city' => $contact->address->city ?? null,
            'pincode' => $contact->address->pincode ?? null,
            'state' => $contact->address->state ?? null,
            'country' => $contact->address->country->name ?? null,
            'phone' => $contact->phone ?? null,
            'mobile' => $contact->mobile ?? null,
            'tax_type' => $contact->tax->type ?? null,
            'gstn' => $contact->gstn ?? null,
            'pan' => $contact->pan ?? null,
            'state_code' => $contact->state_code ?? null,
            'supplier_country' => $supplier_country ?? null
        ];

        return response()->json($data);
    }
}
