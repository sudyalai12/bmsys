<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
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
        $contact->update([
            'name' => $request->contact,
            'email' => $request->email,
            'department' => $request->department,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
        ]);

        return redirect("/contacts/{$contact->id}");
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect('/contacts');
    }
}
