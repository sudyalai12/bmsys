<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateContactRequest;
use App\Models\Address;
use App\Models\Contact;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::get();
        return view('contacts.index', compact('contacts'));
    }

    public function create() {}

    public function store(Request $request) {}

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $state = State::where('name', $request->state)->first();
        $country = Country::where('name', $request->country)->first();
        $address = Address::firstOrCreate(
            [
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'pincode' => $request->pincode,
                'state_id' => $state->id,
                'country_id' => $country->id,
            ]
        );

        $contact->update(
            [
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

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect('/contacts');
    }
}
