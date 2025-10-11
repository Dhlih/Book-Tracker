<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    public function show_books_index()
    {
        $user_id = Auth::id();
        $books = Book::where("user_id", $user_id)->get();

        return view("books.index", ["books" => $books]);
    }

    public function show_books_finished(Request $request)
    {
        $user_id = Auth::id();
        $books = Book::where("user_id", $user_id)->where("status", "finished")->get();

        return view("books.finished", ["books" => $books]);
    }

    public function show_books_reading()
    {
        $user_id = Auth::id();
        $books = Book::where("user_id", $user_id)->where("status", "reading")->get();

        return view("books.reading", ["books" => $books]);
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

    public function show_add_book()
    {
        return view("books.add");
    }

    public function search(Request $request, $type)
    {
        $keyword = $request->q;
        $user_id = Auth::id();

        if ($keyword) {
            if ($type != "index") {
                $books = Book::where("title", "like", "%{$keyword}%")->where("status", $type)->where("user_id", $user_id)->get();
                // dd($books);
            } else {
                $books = Book::where("title", "like", "%{$keyword}%")->where("user_id", $user_id)->get();
            }
        } else {
            $books = Book::where("user_id", $user_id)->get();
        }

        if ($books->isEmpty()) {
            return view("books.{$type}", [
                "error" => "Cannot find books"
            ]);
        }

        return view("books.{$type}", ["books" => $books]);
    }
}
