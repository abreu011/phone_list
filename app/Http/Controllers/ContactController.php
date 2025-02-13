<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return ContactResource::collection($contacts);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $contact = Contact::create($data);

        return new ContactResource($contact);
    }
}
