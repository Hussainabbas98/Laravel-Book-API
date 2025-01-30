<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //without message
        // return Book::all();

        //with message
        $books = Book::all();
            return response()->json([
                'message' => 'Books retrieved successfully',
                'data' => $books
            ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //without message
        // $book = Book::create($request->all());
        // return response()->json($book, 201);

        //with message
        $book = Book::create($request->all());
            return response()->json([
                'message' => 'Created Successfully',
                'book' => $book
            ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $book = Book::find($id);
        if(!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        //without message
        // return $book;

        //with message
        return response()->json([
            'message' => 'Book retrieved successfully',
            'data' => $book
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $book = Book::find($id);
        if(!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        $book->update($request->all());
        //without message
        // return response()->json($book, 200);

        //with message
        return response()->json([
            'message' => 'Book updated successfully',
            'data' => $book
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $book = Book::find($id);
        if(!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        $book->delete();
        return response()->json(['message'=> 'Book Deleted'], 204);
    }
}
