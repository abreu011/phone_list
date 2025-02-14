<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;

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

    public function show(string $id) // Show contact by id
    {
        $contact = Contact::findOrFail($id);

        return new ContactResource($contact);
    }
}