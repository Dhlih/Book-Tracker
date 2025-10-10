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
        return view("books.index", ["posts" => $books]);
    }

    public function show_books_read()
    {
        return view("books.read");
    }

    public function show_books_reading()
    {
        return view("books.reading");
    }

    public function add_book(Request $request)
    {
        $user_id = Auth::id();
        $validated = $request->validate([
            "title" => "required|string",
            "author" => "required|string",
            "status" => "required|string",
            "total_page" => "required|integer",
            "cover" => "nullable|string",
            "last_read_at" => "nullable|date",
        ]);

        $validated["user_id"] = $user_id;

        $book = Book::create($validated);

        if ($book) {
            return redirect("/books/index");
        }


        return back()->withInput()->with("error", "Failed to add book");
    }

    public function delete_book(Request $request)
    {
        $book_id = $request->book_id;
        $user_id = Auth::id();

        $book = Book::where("id", $book_id)->where("user_id", $user_id);

        $book->delete();
        return back()->with("error", "Failed to delete book");
    }

    public function show_books_create()
    {
        return view("books.create");
    }

    public function search(Request $request, $type)
    {
        $keyword = $request->q;
        $user_id = Auth::id();

        $books = Book::where("title", "like", "%{$keyword}%")->where("user_id", $user_id)->get();

        if ($books->isEmpty()) {
            return view("books.{$type}", [
                "error" => "Cannot find books"
            ]);
        }

        return view("books.{$type}", ["books" => $books]);
    }
}
