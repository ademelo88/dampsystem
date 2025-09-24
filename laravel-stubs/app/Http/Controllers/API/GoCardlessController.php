<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoCardlessController extends Controller
{
    public function webhook(Request $request)
    {
        // Verify signature using GOCARDLESS_WEBHOOK_SECRET (todo)
        // Update Payment records here
        return response()->json(['ok'=>true]);
    }
}
