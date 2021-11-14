<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends ResourceController {

    static $resource = Category::class;

    static $validation = [
        'name' => 'required|string|max:255'
    ];

    static $orderBy = 'name';

    public function search(Request $request) {
        $query = $request->input('q');
        $authors = Category::select(['id', 'name'])
            ->where('name', 'ilike', "%$query%")
            ->orderBy('name')
            ->paginate(30);
        return response()->json($authors);
    }
 
}
