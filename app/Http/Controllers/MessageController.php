<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Events\MyEvent;
use Illuminate\Support\Facades\Input;


class MessageController extends Controller
{
    public function saveAttachment(Request $request)
    {
        \Log::debug($request->all());
        // return response()->json($request);
    }
}