<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Models\Address;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Department;
use App\Models\Tax;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = Customer::get();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(StoreCustomerRequest $request)
    {
        $contact = Contact::where('name', $request->contact)->where('email', $request->email)->first();
        if ($contact) {
            return back()->withErrors(['contact' => 'contact already present']);
        }

        $customer = Customer::firstOrCreate(
            [
                'name' => $request->customer,
                'nickname' => $request->nickname,
                'tax_type' => $request->tax_type,
                'gstn' => $request->gstn,
                'pan' => $request->pan,
                'state_code' => $request->state_code,
            ]
        );
        $address = Address::firstOrCreate(
            [
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'pincode' => $request->pincode,
                'state' => $request->state,
                'country' => $request->country,
            ]
        );

        $contact = Contact::create(
            [
                'customer_id' => $customer->id,
                'name' => $request->contact,
                'email' => $request->email,
                'department' => $request->department,
                'address_id' => $address->id,
                'phone' => $request->phone,
                'mobile' => $request->mobile,
            ]
        );
        return redirect("/contacts/{$contact->id}");
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }
}
