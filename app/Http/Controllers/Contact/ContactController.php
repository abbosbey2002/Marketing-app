<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth()->user();
        $contacts = Contact::where('provider_id', $user->provider_id)->paginate(10);

        return view('admin.providers.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.providers.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'provider_id' => 'required|exists:providers,id',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'link' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);

        Contact::create($validatedData);

        return redirect()->route('contacts.index')->with('success', 'kontakt muvaffaqiyatli yaratildi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);

        return view('admin.providers.contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('admin.providers.contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $validatedData = $request->validate([
            'provider_id' => 'required|integer',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'link' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);

        $contact->update($validatedData);

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
