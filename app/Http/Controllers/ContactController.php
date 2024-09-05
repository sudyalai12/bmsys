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

class ContactController extends Controller
{

    public function index(): \Illuminate\View\View
    {
        $contacts = Contact::orderBy('updated_at', 'desc')->get();
        return view('contacts.index', compact('contacts'));
    }

    public function create() {}

    public function store(Request $request) {}

    public function show(Contact $contact): \Illuminate\View\View
    {
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact): \Illuminate\View\View
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(StoreCustomerRequest $request, Contact $contact)
    {
        $country = Country::where('name', $request->country)->first();
        $tax = Tax::where('type', $request->tax_type)->first();
        $customer = Customer::firstOrCreate(
            [
                'name' => $request->customer,
                'nickname' => $request->nickname,
            ]
        );
        if ($customer->country_id == 121) {
            $customer->update(['country_id' => $country->id]);
        }

        $address = Address::firstOrCreate(
            [
                'customer_id' => $customer->id,
                'country_id' => $country->id,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'pincode' => $request->pincode,
                'state' => $request->state,
            ]
        );

        $department = Department::firstOrCreate(['name' => $request->department]);
        $contact->update(
            [
                'name' => $request->contact,
                'email' => $request->email,
                'department_id' => $department->id,
                'address_id' => $address->id,
                'phone' => $request->phone,
                'mobile' => $request->mobile,
                'tax_id' => $tax->id,
                'gstn' => $request->gstn,
                'pan' => $request->pan,
                'state_code' => $request->state_code,
            ]
        );

        return redirect("/contacts/{$contact->id}");
    }

    public function destroy(Contact $contact): \Illuminate\Http\RedirectResponse
    {
        $contact->delete();
        return redirect('/contacts');
    }
}
