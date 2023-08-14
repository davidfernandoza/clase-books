<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
	public function home()
	{
		$books = Book::get();
		return view('index', compact('books'));
	}

	public function index()
	{
		$authors = Author::get();
		$books = Book::with('author', 'category')->get();
		return view('books.index', compact('books', 'authors'));
	}


	public function create()
	{
		//
	}


	public function store(Request $request)
	{
		$book = new Book($request->all());
		$book->save();
		return response()->json([], 200);
	}


	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
	}


	public function update(Request $request, $id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}
}
