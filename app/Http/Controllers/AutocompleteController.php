<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Product;
use App\Models\State;
use App\Models\Supplier;
use App\Models\Tax;
use Illuminate\Http\Request;

class AutocompleteController extends Controller
{
    function fetch(Request $request)
    {
        $column = $request->get('column');
        $search = $request->get('search');
        $customer = $request->get('customer');
        $country = $request->get('country');
        $supplier = $request->get('supplier');

        $data = match ($column) {
            'customer' => Customer::where('name', 'LIKE', "$search%")
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
            'contact' => Contact::whereHas('customer', fn($q) => $q->where('name', $customer))
                ->select('name')
                ->orderBy('name')
                ->get()
                ->pluck('name'),
            'state' => State::whereHas('country', fn($q) => $q->where('name', $country))
                ->select('name')
                ->orderBy('name')
                ->get()
                ->pluck('name'),
            'supplier' => Supplier::where('name', 'LIKE', "$search%")
                ->select('name')
                ->orderBy('name')
                ->get()
                ->pluck('name'),
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
        $customer = $request->get('customer');
        $contact = $request->get('contact');
        $part_number = $request->get('part_number');
        $supplier = $request->get('supplier');

        if ($customer || $contact) {
            if ($customer) {
                $customer = Customer::where('name', $customer)->first();
                if ($customer) {
                    $contact = $customer->contacts()->first();
                }
            } elseif ($contact) {
                $contact = Contact::where('name', $contact)->first();
            }

            $data = [
                'customer' => $contact->customer,
                'contact' => $contact,
                'part_number' => $part_number
            ];

            return response()->json($data);
        }elseif($part_number){
            $product = Product::where('part_number', $part_number)->first();
            $data = [
                'product' => $product
            ];
            return response()->json($data);
        }elseif($supplier){
            $supplier = Supplier::where('name', $supplier)->first();
            $data = [
                'supplier' => $supplier
            ];
            return response()->json($data);
        }
    }
}
