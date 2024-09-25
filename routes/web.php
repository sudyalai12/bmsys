<?php

use App\Http\Controllers\AutocompleteController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::view('/', 'home');

    Route::get('/customers', [CustomerController::class, 'index']);
    Route::get('/customers/create', [CustomerController::class, 'create']);
    Route::post('/customers', [CustomerController::class, 'store']);
    Route::get('/customers/{customer}', [CustomerController::class, 'show']);

    Route::get('/contacts', [ContactController::class, 'index']);
    Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit']);
    Route::patch('/contacts/{contact}', [ContactController::class, 'update']);
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy']);
    Route::get('/contacts/{contact}', [ContactController::class, 'show']);

    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/create', [ProductController::class, 'create']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/{product}/edit', [ProductController::class, 'edit']);
    Route::patch('/products/{product}', [ProductController::class, 'update']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);
    Route::get('/products/{product}', [ProductController::class, 'show']);

    Route::get('/quotes', [QuoteController::class, 'index']);
    Route::get('/quotes/create', [QuoteController::class, 'create']);
    Route::post('/quotes', [QuoteController::class, 'store']);
    Route::post('/quotes/{quote}', [QuoteController::class, 'storeItem']);
    Route::delete('/quotes/{quote}/items/{quoteItem}', [QuoteController::class, 'destroyItem']);
    Route::post('/quotes/{quote}/update', [QuoteController::class, 'update']);
    Route::get('/quotes/{quote}/pdf', [PdfController::class, 'quotePdf']);
    Route::get('/quotes/{quote}/create-pdf', [PdfController::class, 'create']);
    Route::get('/quotes/{quote}', [QuoteController::class, 'show']);
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::get('/logout', [LoginController::class, 'destroy']);

Route::get('/search', [AutocompleteController::class, 'fetch']);
Route::get('fetch-details', [AutocompleteController::class, 'fetchDetails']);
