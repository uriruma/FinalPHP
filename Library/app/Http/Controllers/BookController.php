<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Category;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categoryId = $request->input('category', null);
        $books = $this->fetchBooks($request)->simplePaginate(10); // Change the number '10' to the desired number of books per page
        $categories = Category::all();

        return view('books-index', compact('books', 'categories', 'categoryId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'isbn' => 'required|unique:books',
            'title' => 'required',
            'author' => 'required',
            'published_date' => 'required|date',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
        ]);

        $book = Book::create([
            'isbn' => $request->input('isbn'),
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'published_date' => $request->input('published_date'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        $categories = $request->input('categories', []);

        $book->categories()->sync($categories);

        // return redirect()->route("books");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);

        return view('books-show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);

        return view('books-update', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'isbn' => 'required|unique:books,isbn,' . $id,
            'title' => 'required',
            'author' => 'required',
            'published_date' => 'required|date',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
        ]);

        $book = Book::findOrFail($id);

        $book->update([
            'isbn' => $request->input('isbn'),
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'published_date' => $request->input('published_date'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        $categories = $request->input('categories', []);

        $book->categories()->sync($categories);

        // return redirect()->route('books.show', $book->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);

        $book->delete();

        // return redirect()->route('books');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $categoryId = $request->input('category', null);

        $books = $this->fetchBooks($request)->paginate(10); // Change the number '10' to the desired number of books per page
        $categories = Category::all();

        return view('books-index', compact('books', 'search', 'categories', 'categoryId'));
    }
    /**
     * Fetch books based on search and category filters.
     */
    private function fetchBooks(Request $request)
    {
        $search = $request->input('search');
        $categoryId = $request->input('category');

        $query = Book::query();

        if ($search) {
            $query->where(function ($innerQuery) use ($search) {
                $innerQuery->where('title', 'like', '%' . $search . '%')
                    ->orWhere('author', 'like', '%' . $search . '%')
                    ->orWhere('isbn', 'like', '%' . $search . '%');
            });
        }

        if ($categoryId) {
            $query->whereHas('categories', function ($innerQuery) use ($categoryId) {
                $innerQuery->where('categories.id', $categoryId);
            });
        }

        return $query;
    }
}
