<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->limit(50)->get();
        return view('portal.messages', compact('messages'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'to_id' => 'nullable|integer',
            'body' => 'required|string|max:2000'
        ]);
        Message::create(['body'=>$data['body'], 'to_id'=>$data['to_id'] ?? null, 'channel'=>'portal']);
        return back();
    }
}
