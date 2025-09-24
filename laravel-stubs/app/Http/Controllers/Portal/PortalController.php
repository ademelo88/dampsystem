<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\{Quote};

class PortalController extends Controller
{
    public function dashboard()
    {
        $quotes = Quote::latest()->take(10)->get();
        return view('portal.dashboard', compact('quotes'));
    }

    public function quote(Quote $quote)
    {
        $quote->load('options');
        return view('portal.quote', compact('quote'));
    }
}
