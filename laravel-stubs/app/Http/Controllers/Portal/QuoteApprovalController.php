<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Quote, QuoteOption, Invoice};

class QuoteApprovalController extends Controller
{
    public function selectOption(Request $request, Quote $quote, QuoteOption $option)
    {
        abort_unless($option->quote_id === $quote->id, 404);
        $quote->accepted_option_id = $option->id;
        $quote->status = 'accepted';
        $quote->save();
        return back()->with('ok', 'Option selected');
    }

    public function sign(Request $request, Quote $quote)
    {
        $request->validate(['signature' => 'required|string']);
        // Store signature as document or meta
        $meta = $quote->totals ?? [];
        $meta['signature'] = $request->string('signature');
        $quote->totals = $meta;
        $quote->save();
        return back()->with('ok', 'Signed');
    }
}
