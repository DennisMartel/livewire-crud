<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('login/{diver}', [LoginController::class, 'redirectToProvider']);
Route::get('login/{diver}/callback', [LoginController::class, 'handleProviderCallback']);
