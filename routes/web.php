<?php

use App\Http\Controllers\Inventory\IndexController;
use App\Http\Controllers\Inventory\StoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('inventory', IndexController::class)->name('inventory.index');
Route::post('inventory', StoreController::class)->name('inventory.store');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
