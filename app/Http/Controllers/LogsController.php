<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogsController extends Controller
{
    public function create_log(Request $request)
    {
        // dd($request->all());

        $read_at = $request->read_at;
        $duration = $request->duration;
        $page_number = $request->page_number;
        $user_id = Auth::id();
        $book_id = $request->book_id;



        Log::create(["user_id" => $user_id, "book_id" => $book_id, "page_number" => $page_number, "duration" => $duration, "read_at" => $read_at]);
        return back()->with("success", "Progress updated and log recorded.");
    }
}
