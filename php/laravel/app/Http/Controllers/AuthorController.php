<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends ResourceController {

    static $resource = Author::class;

    static $validation = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'string|max:255',
        'date_of_birth' => 'date',
        'city_of_birth' => 'string|max:255',
        'country_of_birth' => 'string|max:255',
    ];

    static $orderBy = 'first_name';

    public function search(Request $request) {
        $query = $request->input('q');
        $authors = Author::select(['id', 'first_name', 'last_name'])
            ->where('first_name', 'like', "%$query%")
            ->orWhere('last_name', 'like', "%$query%")
            ->orderBy('first_name')
            ->paginate(30);
        return response()->json($authors);
    }

}
