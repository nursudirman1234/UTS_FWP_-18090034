<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function index (){
        $books = Book::all();
        return view('pages.books.index', compact('books'));
    }
    public function create(){
        return view('pages.books.create');
    }
    public function store(Request $request){
        Book::create([
           'tittle' => $request->tittle,
           'author' => $request->author,
           'publisher' => $request->publisher 
        ]);
        return redirect()->route('book.index');
    }
    public function destroy($id){
        $book = Book::findOrFail($id);
        $book -> delete();

        return redirect()->route('book.index');
    }
    public function edit($id){
        $book = Book::findOrFail($id);

        return view('pages.books.edit', compact('book'));
    }
    public function update(Request $request, $id){
        $book = Book::findOrFail($id);

        $book->update([
        'tittle' => $request->tittle,
        'author' => $request->author,
        'publisher' => $request->publisher 
                 
        ]);
        return redirect()->route('book.index');
    }
}
