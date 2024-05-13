<?php

use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')
    ->as('auth.')
    ->group(function () {
        Route::get('register', [UserController::class, 'register'])->name('register');
    });

Route::prefix('teacher')
    ->as('teacher.')
    ->group(function () {
        Route::post('register', [TeacherController::class, 'register'])->name('register');
        Route::post('login', [TeacherController::class, 'login'])->name('login');
        Route::get('teacher', [TeacherController::class, 'teacher'])->name('teacher');
        Route::put('update', [TeacherController::class, 'update'])->name('update');
        Route::delete('delete', [TeacherController::class, 'delete'])->name('delete');
    });
