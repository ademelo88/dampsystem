<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function deposit(Request $request)
    {
        // Here you would create Stripe/GoCardless intent/session
        return back()->with('ok', 'Deposit flow initialised (stub)');
    }
}
