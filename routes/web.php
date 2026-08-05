<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AiContentController;

Route::view('/', 'welcome')->name('home');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AiContentController::class, 'index'])->name('dashboard');
});


require __DIR__.'/settings.php';


Route::get('/ai-form', [AiContentController::class, 'showForm'])->name('ai.form')->middleware('auth');
Route::post('/ai-generate', [AiContentController::class, 'generate'])->name('ai.generate')->middleware('auth');
//Route::get('/dashboard', [AiContentController::class, 'index'])->name('dashboard')->middleware('auth');
