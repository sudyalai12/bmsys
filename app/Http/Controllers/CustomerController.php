<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Address;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Customer;
use App\Models\State;
use App\Models\Tax;

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
        $mrms = $request->mr_mrs;
        $name = $mrms . ' ' . $request->contact;
        $contact = Contact::where('name', $name)->where('email', $request->email)->first();
        if ($contact) {
            return back()->withErrors(['contact' => 'contact already present']);
        }

        $customer = Customer::where(['name' => $request->customer, 'nickname' => $request->nickname])->first();
        if ($customer) {
            $customer->contacts()->create([
                'name' => $name,
                'email' => $request->email,
                'department' => $request->department,
                'phone' => $request->phone,
                'mobile' => $request->mobile,
            ]);
        } else {
            $state = State::where('name', $request->state)->first();
            $country = Country::where('name', $request->country)->first();
            $tax = Tax::where('type', $request->tax_type)->first();
            $address = Address::create([
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'pincode' => $request->pincode,
                'state_id' => $state->id,
                'country_id' => $country->id,
            ]);

            $customer = Customer::create([
                'name' => $request->customer,
                'nickname' => $request->nickname,
                'address_id' => $address->id,
                'tax_id' => $tax->id,
                'gstn' => $request->gstn,
                'pan' => $request->pan,
                'state_code' => $request->state_code,
            ]);
            $customer->contacts()->create([
                'name' => $name,
                'email' => $request->email,
                'department' => $request->department,
                'phone' => $request->phone,
                'mobile' => $request->mobile,
            ]);
        }
        return redirect("/customers/{$customer->id}");
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $state = State::where('name', $request->state)->first();
        $country = Country::where('name', $request->country)->first();
        $tax = Tax::where('type', $request->tax_type)->first();
        $customer->update([
            'name' => $request->customer,
            'nickname' => $request->nickname,
            'tax_id' => $tax->id,
            'gstn' => $request->gstn,
            'pan' => $request->pan,
            'state_code' => $request->state_code,
        ]);

        $customer->address()->update([
            'address1' => $request->address1,
            'address2' => $request->address2,
            'city' => $request->city,
            'pincode' => $request->pincode,
            'state_id' => $state->id,
            'country_id' => $country->id,
        ]);
        return redirect("/customers/{$customer->id}");
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('/customers');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }
}
