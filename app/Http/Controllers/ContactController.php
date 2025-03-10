<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();
        
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('last_name')) {
            $query->where('last_name', 'like', '%' . $request->last_name . '%');
        }

        if ($request->has('phone_number')) {
            $query->where('phone_number', 'like', '%' . $request->phone_number . '%');
        }

        $contact = $query->paginate($request->per_page ?? 15);

        return ContactResource::collection($contact);
    }

    public function store(StoreContactRequest $request) // Create new contact 
    {
        $validated = $request->validated();
        $contact = Contact::create($validated);
        
        return new ContactResource($contact);
    }

    public function show(int $id) // Show contact by id
    {
        $contact = Contact::with('addresses')->findOrFail($id);

        return new ContactResource($contact);
    }

    public function update(UpdateContactRequest $request, int $id) // Update contact by id
    {
        $contact = Contact::findOrFail($id); 

        $validated = $request->validated();               
        $contact->update($validated);

        return new ContactResource($contact);        
    }

    public function destroy(int $id) // Delete contact by id
    {
        $contact = Contact::with('addresses')->findOrFail($id);
        $contact->delete();

        return response()->json([], Response::HTTP_NO_CONTENT); // Return status 204 (success)     
    }

}