<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('tjc.home')->middleware('localization');
Route::get('/event/{slug}', [\App\Http\Controllers\HomeController::class, 'event'])->name('tjc.event')->middleware('localization');

// change language
Route::get('/language/{language}', [\App\Http\Controllers\LanguageController::class, 'LanguageSwitch'])->name('tjc.language');
