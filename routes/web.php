<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AiContentController;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';

//TO DO: ADD AUTH
Route::get('/ai-form', [AiContentController::class, 'showForm'])->name('ai.form');
Route::post('/ai-generate', [AiContentController::class, 'generate'])->name('ai.generate');