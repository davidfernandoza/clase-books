<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LendController extends Controller
{
    public function index()
    {
        //
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

    public function requestLend(Book $book)
    {
        $user = Auth::user();
        $book->lends()->create([
            'customer_user_id' => $user->id,
            'date_request' => Carbon::now()->format('Y-m-d'),
            'status' => 'SOLICITADO'
        ]);
        return back()->with('success', 'Libro solicitado, te llamaran cuando este disponible');
    }
}
