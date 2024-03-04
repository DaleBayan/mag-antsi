<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('backend.contacts.index', [
            'show' => 'system setup',
            'active' => 'contact',
            'contacts' => Contact::all(),
        ]);
    }

    public function create()
    {
        return view('backend.contacts.create',[
            'show' => 'system setup',
            'active' => 'contact',
        ]);
    }

    public function store(StoreContactRequest $request)
    {
        Contact::create($request->validated());

        return redirect()->route('contacts.index')->with('message', 'Contact Successfully Created');
    }

    public function edit($contact)
    {
        return view('backend.contacts.edit', [
            'show' => 'system setup',
            'active' => 'contact',
            'contact' => Contact::find(Crypt::decryptString($contact)),
        ]);
    }

    public function update(UpdateContactRequest $request, $contact)
    {

        $contact = Contact::find(Crypt::decryptString($contact));
        $contact->update($request->validated());

        return redirect()->route('contacts.index')->with('message', 'Contact Successfully Updated');
    }

    public function destroy($contact)
    {
        $contact = Contact::find(Crypt::decryptString($contact));
        $contact->delete();

        return redirect()->route('contacts.index')->with('message', $contact->full_name . ' Contact Successfully Deleted'); 
    }
}
