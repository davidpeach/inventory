<?php

use App\Http\Controllers\Inventory\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('inventory', IndexController::class)->name('inventory.index');
