<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
	public function index()
	{
		$books = Book::get();
		return view('index', compact('books'));
	}


	public function create()
	{
		//
	}


	public function store(Request $request)
	{
		//
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
