<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class AddContactController extends Controller
{
    //
    public function index()
    {
        $contacts = Contact::all();
        return view('layouts.private.contact.index', compact('contacts'));
    }

    public function create()
    {
        return view('layouts.private.contact.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        Contact::create($request->all());

        return redirect()->route('contact.index')
            ->with('success', 'Data contact berhasil ditambahkan.');
    }

    public function edit(Contact $contact)
    {
        return view('layouts.private.contact.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'location' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $contact->update($request->all());

        return redirect()->route('contact.index')
            ->with('success', 'Data contact berhasil diperbarui.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contact.index')
            ->with('success', 'Data contact berhasil dihapus.');
    }
}
