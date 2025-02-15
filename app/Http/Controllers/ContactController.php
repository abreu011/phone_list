<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PhpParser\Node\Expr\Cast\Int_;

class ContactController extends Controller
{
    public function index() // Return all contacts
    {
        $contacts = Contact::all();
        return ContactResource::collection($contacts);
    }

    public function store(Request $request) // Create new contact 
    {
        $data = $request->all();
        $contact = Contact::create($data);

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
        $data = $request->all();
        $contact->update($data);

        return new ContactResource($contact);        
    }

    public function destroy(int $id) // Delete contact by id
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return response()->json([], Response::HTTP_NO_CONTENT); // Return status 204 (sucesso)     
    }

}