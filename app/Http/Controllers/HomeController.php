<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Book;

class HomeController extends Controller {
    public function index(Request $request) {
        $books = [];
        if ($request->has('search')) {
            $search = '%'.$request->get('search').'%';
            $books = Book::where(function($query) use($search) {
                $query->where('status', 'available');

                $query->where('title', 'LIKE', $search)
                    ->orWhere('author', 'LIKE', $search)
                    ->orWhere('genre', 'LIKE', $search)
                    ->orWhere('description', 'LIKE', $search);

            })->get()->toArray();
        }
        return view('index', [
            'initial' => [-6.21462, 106.84513],
            'books' => $books,
        ]);
    }

    public function catalog(Request $request) {
        if ($request->has('search')) {
            $search = '%'.$request->get('search').'%';
            $books = Book::where(function($query) use($search) {
                $query->where('status', 'available');

                $query->where('title', 'LIKE', $search)
                    ->orWhere('author', 'LIKE', $search)
                    ->orWhere('genre', 'LIKE', $search)
                    ->orWhere('description', 'LIKE', $search);

            })->paginate(12);
        } else {
            $books = Book::where('status', 'available')->paginate(12);
        }
        return view('catalog', [
            'books' => $books
        ]);
    }

    public function book($id) {
        $book = Book::find($id);
        return view('book', [
            'book' => $book
        ]);
    }

    public function borrow($id) {
        $borrower = Auth::user()['id'];
        $book = Book::find($id);

        $params = [
            'borrower_id' => Auth::user()['id'],
            'status' => 'unavailable',
            'borrowed_at' => Date('Y-m-d H:i:s'),
        ];

        $book->update($params);

        return redirect('history');
    }

    public function lend() {
        return view('lend');
    }

    public function addBook(Request $request) {
        $params = $request->only(['title', 'author', 'genre', 'description']);
        $params['created_at'] = Date('Y-m-d H:i:s');
        $params['lender_id'] = Auth::user()['id'];

        if($request->hasFile('cover')) {
            $file = $request->file('cover');
            $cover = rand() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move('books', $cover);
            $params['cover'] = $cover;
        }

        Book::create($params);

        return redirect('catalog');
    }

    public function history() {
        $user = Auth::user()['id'];
        $books = Book::where('lender_id', $user)->get();
        $lended_book = Book::where('lender_id', $user)->where('status', 'unavailable')->get();
        $borrowed_book = Book::where('borrower_id', $user)->get();

        return view('history', [
            'books' => $books,
            'lended_books' => $lended_book,
            'borrowed_books' => $borrowed_book
        ]);
    }
}
