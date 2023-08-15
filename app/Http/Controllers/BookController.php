<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Http\Traits\UploadFile;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Book\BookRequest;
use App\Http\Requests\Book\BookUpdateRequest;

class BookController extends Controller
{
	use UploadFile;

	public function home()
	{
		$books = Book::with('author', 'category', 'file')->get();
		return view('index', compact('books'));
	}

	public function index()
	{
		$authors = Author::get();
		$books = Book::with('author', 'category', 'file')->get();
		return view('books.index', compact('books', 'authors'));
	}


	public function store(BookRequest $request)
	{
		try {
			DB::beginTransaction();
			$book = new Book($request->all());
			$book->save();
			$this->uploadFile($book, $request);
			DB::commit();
			return response()->json([], 200);
		} catch (\Throwable $th) {
			DB::rollback();
			throw $th;
		}
	}

	public function show(Book $book)
	{
		return response()->json(['book' => $book], 200);
	}

	public function update(BookUpdateRequest $request, Book $book)
	{
		try {
			DB::beginTransaction();
			$book->update($request->all());
			$this->uploadFile($book, $request);
			DB::commit();
			return response()->json([], 204);
		} catch (\Throwable $th) {
			DB::rollback();
			throw $th;
		}
	}

	public function destroy(Book $book)
	{
		$book->delete();
		$this->deleteFile($book);
		return response()->json([], 204);
	}
}
