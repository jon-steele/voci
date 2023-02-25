<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\DeckController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Decks
// Route::get('decks/{deck}', 'DecksController@show')->name('decks.show');
Route::resource('decks', DeckController::class)->middleware(['auth', 'verified']);

// Cards
Route::resource('decks.cards', CardController::class)->middleware(['auth', 'verified']);

// Study
Route::get('study/prime/{deck}', [StudyController::class, 'prime'])->name('study.prime')->middleware(['auth', 'verified']);
Route::get('study/initialize/{deck}', [StudyController::class, 'initialize'])->name('study.initialize')->middleware(['auth', 'verified']);
Route::get('study/show/{deck}', [StudyController::class, 'show'])->name('study.show')->middleware(['auth', 'verified']);

// Authentication
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
