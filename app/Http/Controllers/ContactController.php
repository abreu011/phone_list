<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;



class ContactController extends Controller
{
    public function index() // Show all contacts
    {
        // $contacts = Contact::all();
        $contacts = Contact::simplePaginate(4);    // Show contacts with paginate (3 contacts)   
                
        return ContactResource::collection($contacts);
    }

    public function store(Request $request) // Create new contact 
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'last_name' => 'required|max:150',
            'phone_number' => 'required|unique:contacts|min:10|max:20'
        ]);
            
        $contact = Contact::create($validated);
        
        return new ContactResource($contact);
    }

    public function show(int $id) // Show contact by id
    {
        $contact = Contact::findOrFail($id);

        return new ContactResource($contact);
    }

    public function update(Request $request, int $id) // Update contact by id
    {
        $contact = Contact::findOrFail($id);
        $validated = $request->all();
        Validator::make($validated, [
            'name' => 'required|max:100',
            'last_name' => 'required|max:150',
            'phone_number' => [
            'required',
            Rule::unique('contacts')->ignore($contact->id),
            ],
        ]);

        $contact->update($validated);

        return new ContactResource($contact);        
    }

    public function destroy(int $id) // Delete contact by id
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return response()->json([], Response::HTTP_NO_CONTENT); // Return status 204 (sucesso)     
    }

}