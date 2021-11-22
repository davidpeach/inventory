<?php

use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get(uri: '/search', action: [SearchController::class, 'index']);
