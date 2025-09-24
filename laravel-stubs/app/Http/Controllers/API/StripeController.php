<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as CheckoutSession;

class StripeController extends Controller
{
    public function checkout(Request $request)
    {
        $data = $request->validate([
            'amount' => 'required|numeric|min:1',
            'currency' => 'nullable|string',
            'success_url' => 'required|url',
            'cancel_url' => 'required|url',
        ]);
        Stripe::setApiKey(config('services.stripe.secret'));
        $session = CheckoutSession::create([
            'mode' => 'payment',
            'line_items' => [[
                'price_data' => [
                    'currency' => $data['currency'] ?? 'gbp',
                    'product_data' => ['name' => 'Deposit'],
                    'unit_amount' => (int) round($data['amount'] * 100),
                ],
                'quantity' => 1,
            ]],
            'success_url' => $data['success_url'],
            'cancel_url' => $data['cancel_url'],
        ]);
        return response()->json(['id' => $session->id, 'url' => $session->url]);
    }

    public function webhook(Request $request)
    {
        // You can verify signature with STRIPE_WEBHOOK_SECRET if desired
        // Update Payment records here based on event type
        return response()->json(['ok'=>true]);
    }
}
