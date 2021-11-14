<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends ResourceController {
    
    static $resource = Book::class;

    static $validation = [
        'title' => 'required|max:255',
        'description' => 'max:2047',
        'published_at' => 'date|nullable',
        'authors' => 'array|numericarray',
        'categories' => 'array|numericarray',
    ];

    static $orderBy = 'title';

}
