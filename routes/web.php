<?php

use App\Http\Controllers\AutocompleteController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SupplierController;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Quote;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        $customers = Customer::orderBy('updated_at', 'desc')->get()->take(5);
        $products = Product::orderBy('updated_at', 'desc')->get()->take(5);
        $quotes = Quote::orderBy('updated_at', 'desc')->get()->take(5);
        return view('home', compact('customers', 'products', 'quotes'));
    });

    Route::resource('customers', CustomerController::class)->only([
        'index',
        'create',
        'store',
        'edit',
        'update',
        'show',
        'destroy'
    ]);

    Route::resource('contacts', ContactController::class)->only([
        'index',
        'edit',
        'update',
        'destroy',
        'show'
    ]);

    Route::resource('suppliers', SupplierController::class)->only([
        'index',
        'show',
        'destroy',
        'edit',
        'update'
    ]);

    Route::resource('products', ProductController::class)->only([
        'index',
        'create',
        'store',
        'edit',
        'update',
        'destroy',
        'show'
    ]);

    Route::resource('quotes', QuoteController::class)->only([
        'index',
        'create',
        'store',
        'show',
        'update',
    ]);
    Route::post('/quotes/{quote}/items', [QuoteController::class, 'storeItem']);
    Route::delete('/quotes/{quote}/items/{quoteItem}', [QuoteController::class, 'destroyItem']);
    Route::get('/quotes/{quote}/pdf', [PdfController::class, 'quotePdf']);
    Route::get('/quotes/{quote}/create-pdf', [PdfController::class, 'create']);
    
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::get('/logout', [LoginController::class, 'destroy']);

Route::get('/search', [AutocompleteController::class, 'fetch']);
Route::get('fetch-details', [AutocompleteController::class, 'fetchDetails']);
