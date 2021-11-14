<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/books');

Route::get('/authors/search', [AuthorController::class, 'search']);

Route::get('/categories/search', [CategoryController::class, 'search']);

Route::resources([
    'authors' => AuthorController::class,
    'books' => BookController::class,
    'categories' => CategoryController::class,
]);
