<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'contact.first_name' => 'required|string',
            'contact.last_name'  => 'required|string',
            'contact.email'      => 'required|email',
            'contact.phone'      => 'nullable|string',
            'property.address'   => 'required|string',
            'property.postcode'  => 'required|string',
            'problems'           => 'array',
        ]);

        $lead = Lead::create([
            'contact' => $data['contact'],
            'property'=> $data['property'],
            'problems'=> $data['problems'] ?? [],
            'status'  => 'new',
        ]);

        return response()->json(['id' => $lead->id], 201);
    }
}
