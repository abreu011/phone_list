<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use App\Models\Contact;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AddressController extends Controller
{
    public function search(Request $request)
    {
        $zip_code = $request->input('cep');        
        $response = Http::get("https://viacep.com.br/ws/{$zip_code}/json/");

        return response()->json($response->json());

    }

    public function store(StoreAddressRequest $request, Contact $contact)
    {
        $contact_address = $contact->addresses()->create($request->validated());
    
        return new AddressResource($contact_address);
    }

    public function update(UpdateAddressRequest $request, int $id)
    {
        $address = Address::findOrFail($id); 

        $validated = $request->validated();               
        $address->update($validated);

        return new AddressResource($address);      
    }

    public function show(int $id)
    {
        $address = Address::findOrFail($id);
        
        return new AddressResource($address);
    }

    public function destroy(int $id) 
    {
        $address = Address::findOrFail($id);
        $address->delete();

        return response()->json([], Response::HTTP_NO_CONTENT); 
    }
}