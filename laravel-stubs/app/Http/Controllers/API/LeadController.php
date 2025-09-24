<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Lead, Contact, Property};

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'contact.first_name' => 'required|string',
            'contact.last_name'  => 'required|string',
            'contact.email'      => 'nullable|email',
            'contact.phone'      => 'nullable|string',
            'property.address'   => 'required|string',
            'property.postcode'  => 'required|string',
            'property.type'      => 'nullable|string',
            'problems'           => 'array',
            'severity'           => 'nullable|string',
            'duration'           => 'nullable|string',
            'metadata'           => 'array'
        ]);

        $contact = Contact::firstOrCreate(
            ['email' => $data['contact']['email'] ?? null, 'phone' => $data['contact']['phone'] ?? null],
            $data['contact']
        );
        $property = Property::create(array_merge($data['property'], ['contact_id' => $contact->id]));

        $lead = Lead::create([
            'contact_id' => $contact->id,
            'property_id'=> $property->id,
            'problems'   => $data['problems'] ?? [],
            'severity'   => $data['severity'] ?? null,
            'duration'   => $data['duration'] ?? null,
            'status'     => 'new',
            'metadata'   => $data['metadata'] ?? [],
        ]);

        return response()->json(['id' => $lead->id], 201);
    }
}
