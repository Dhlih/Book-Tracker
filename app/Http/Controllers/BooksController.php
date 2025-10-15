<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class BooksController extends Controller
{
    // show page
    public function show_books_index()
    {
        $user_id = Auth::id();
        $books = Book::where("user_id", $user_id)->get();

        foreach ($books as $book) {
            $book->progress = $this->get_progress($book);
        }

        return view("books.index", ["books" => $books]);
    }

    public function show_books_finished()
    {
        $user_id = Auth::id();
        $books = Book::where("user_id", $user_id)->where("status", "finished")->get();

        foreach ($books as $book) {
            $book->progress = $this->get_progress($book);
        }

        return view("books.finished", ["books" => $books]);
    }

    public function show_books_reading()
    {
        $user_id = Auth::id();
        $books = Book::where("user_id", $user_id)->where("status", "reading")->get();

        foreach ($books as $book) {
            $book->progress = $this->get_progress($book);
        }

        return view("books.reading", ["books" => $books]);
    }

    public function show_add_book()
    {
        return view("books.add");
    }

    public function show_update_book($id)
    {
        $book = Book::with('logs')->findOrFail($id);

        return view('books.update', compact('book'));
    }

    // crud
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

    public function update_status(Request $request, $id)
    {
        $status = $request->status;
        $book = Book::findOrFail($id);
        $book->update(["status" => $status]);

        return back();
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

    public function search_google_books(Request $request)
    {
        $keyword = $request->q;

        $url = "https://www.googleapis.com/books/v1/volumes?q=intitle:" . urlencode($keyword);
        $response = Http::get($url);
        $items = $response->json("items", []);
        $limited_items = array_slice($items, 0, 5);

        $books = array_map(function ($item) {
            $info = $item['volumeInfo'] ?? [];
            $imageLink = $info['imageLinks']['thumbnail'] ?? null;
            $pageCount = $info['pageCount'];

            return [
                'title' => $info['title'] ?? 'Unknown Title',
                'author' => $info['authors'][0] ?? 'Unknown Author',
                'cover' => $imageLink,
                'total_page' => $pageCount
            ];
        }, $limited_items);

        return response()->json($books);
    }

    public function get_progress($book)
    {
        $current_page = $book->logs[0]->page_number ?? 0;
        $total_page = $book->total_page;

        return round(($current_page / $total_page) * 100) . '%';
    }
}
