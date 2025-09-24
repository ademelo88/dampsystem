<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:51200' // 50MB
        ]);

        $path = $request->file('file')->store('uploads', 's3');
        $url  = Storage::disk('s3')->url($path);
        return response()->json(['path' => $path, 'url' => $url], 201);
    }
}
