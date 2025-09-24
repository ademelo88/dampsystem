<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Quote, QuoteOption, Lead};

class QuoteController extends Controller
{
    public function show(Quote $quote)
    {
        return response()->json($quote->load('options'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'lead_id' => 'required|exists:leads,id',
            'options' => 'array|required'
        ]);

        $quote = Quote::create([
            'lead_id' => $data['lead_id'],
            'status'  => 'sent',
            'totals'  => []
        ]);

        foreach(($data['options'] ?? []) as $opt){
            QuoteOption::create([
                'quote_id' => $quote->id,
                'tier' => $opt['tier'],
                'summary' => $opt['summary'] ?? null,
                'warranty_months' => $opt['warranty_months'] ?? 12,
                'lines' => $opt['lines'] ?? [],
                'totals'=> $opt['totals'] ?? []
            ]);
        }

        return response()->json(['id' => $quote->id], 201);
    }
}
