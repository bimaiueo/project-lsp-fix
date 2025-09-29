<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{LetterController,CategoryController};
Route::get('/', fn() => redirect()->route('letters.index'));
Route::view('/about', 'about')->name('about');
Route::resource('letters', LetterController::class);
Route::get('letters/{letter}/download',[LetterController::class,'download'])->name('letters.download');
Route::resource('categories', CategoryController::class);
