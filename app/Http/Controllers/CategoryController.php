<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
	public function index(Request $request)
	{
		$categories = Category::get();
		if (!$request->ajax()) return view('categories.index');
		return response()->json(['categories' => $categories], 200);
	}

	public function store(Request $request)
	{
		$category = new Category($request->all());
		$category->save();
		return response()->json([], 200);
	}

	public function getAll()
	{
		$categories = Category::query();
		return DataTables::of($categories)->toJson();
	}


	public function show(Category $category)
	{
		return response()->json(['category' => $category], 200);
	}

	public function update(Request $request, $id)
	{
		//
	}

	public function destroy(Category $category)
	{
		$category->delete();
		return response()->json([], 204);
	}
}
