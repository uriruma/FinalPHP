<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


use App\Http\Controllers\BookController;

Route::get('/',[ BookController::class, 'index'])->name('books');

Route::get('/books', [BookController::class, 'index'])->name('books.index');

Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

Route::post('/books', [BookController::class, 'store'])->name('createbook');

Route::get('/books/{id}', [BookController::class, 'show']);

Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');

Route::put('/books/{id}', [BookController::class, 'update'])->name('booksupdate');

Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

Route::post('/books/search', [BookController::class, 'search'])->name('books.search');

// Route::get('/books/search', [BookController::class, 'search'])->name('bookssearch');
// Route::get('/books/search', [BookController::class, 'search'])->name('books.search');

// Route::get('/books/search', [BookController::class, 'search'])->name('books.search');

