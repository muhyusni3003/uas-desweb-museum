<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollectionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('collections', [CollectionController::class, 'index']);
Route::get('/collections/{collection}', [CollectionController::class, 'show'])->name('collections.show');

