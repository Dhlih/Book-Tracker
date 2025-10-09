<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    public function show_books()
    {
        $books = Book::all();
        return view("books.books", ["posts" => $books]);
    }

    public function show_books_read()
    {
        return view("books.books-read");
    }

    public function show_books_reading()
    {
        return view("books.books-reading");
    }

    public function add_book(Request $request)
    {
        $validated = $request->validate([
            "title" => "required|string",
            "author" => "required|string",
            "status" => "required|string",
            "total_page" => "required|integer",
            "cover" => "nullable|string",
            "last_read_at" => "nullable|date",
        ]);

        $book = Book::create($validated);

        if ($book) {
            return back()->with("success", "");
        }

        return back()->with("error", "Failed to add book");
    }

    public function delete_book(Request $request)
    {
        $book_id = $request->book_id;
        $user_id = Auth::id();

        $book = Book::where("id", $book_id)->where("user_id", $user_id);

        $book->delete();
        return back()->with("error", "Failed to delete book");
    }
}
