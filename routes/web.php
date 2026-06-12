<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class, 'index'])->name('jobs.index');
Route::get('/vacatures/{job}', [JobController::class, 'show'])->name('jobs.show');
Route::view('/quiz', 'quiz')->name('quiz');