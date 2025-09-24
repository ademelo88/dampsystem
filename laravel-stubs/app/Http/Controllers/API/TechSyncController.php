<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TechSyncController extends Controller
{
    public function sync(Request $request)
    {
        $payload = $request->validate(['records'=>'required|array']);
        Log::info('TechSync batch', ['count'=>count($payload['records'])]);
        // TODO: Map records to JobChecklist and persist
        return response()->json(['ok'=>true,'count'=>count($payload['records'])]);
    }
}
