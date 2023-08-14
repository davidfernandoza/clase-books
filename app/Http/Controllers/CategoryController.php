<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	public function index(Request $request)
	{
		$categories = Category::get();
		if (!$request->ajax()) return view();
		return response()->json(['categories' => $categories], 200);
	}


	public function create()
	{
		//
	}


	public function store(Request $request)
	{
		$category = new Category($request->all());
		$category->save();
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
