<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\SchoolClass\CreateController;
use App\Http\Controllers\SchoolClass\DestroyController;
use App\Http\Controllers\SchoolClass\EditController;
use App\Http\Controllers\SchoolClass\IndexController;
use App\Http\Controllers\SchoolClass\ShowController;
use App\Http\Controllers\SchoolClass\StoreController;
use App\Http\Controllers\SchoolClass\UpdateController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeachersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Autentication Routes
Route::get('/login', [AuthController::class, 'loginView'])->name('login-view');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login-post');
Route::get('/register', [AuthController::class, 'registerView'])->name('register-view');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register-post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Student Managements Routes
Route::prefix('students')->name('students.')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('index');

    Route::get('/create', [StudentController::class, 'create'])->name('create');

    Route::post('/store', [StudentController::class, 'store'])->name('store');

    Route::get('/{student}', [StudentController::class, 'show'])->name('show');

    Route::get('/{student}/edit', [StudentController::class, 'edit'])->name('edit');

    Route::put('/{student}', [StudentController::class, 'update'])->name('update');

    Route::delete('/{student}', [StudentController::class, 'destroy'])->name('destroy');
});

Route::prefix('teachers')->name('teachers.')->group(function () {
    Route::get('/', [TeachersController::class, 'index'])->name('index');

    Route::get('/create', [TeachersController::class, 'create'])->name('create');

    Route::post('/store', [TeachersController::class, 'store'])->name('store');

    Route::get('/{id}', [TeachersController::class, 'show'])->name('show');

    Route::get('/{id}/edit', [TeachersController::class, 'edit'])->name('edit');

    Route::put('/{id}', [TeachersController::class, 'update'])->name('update');

    Route::delete('/{id}', [TeachersController::class, 'destroy'])->name('destroy');
});

Route::prefix('classes')->name('classes.')->group(function () {
    Route::get('/', IndexController::class)->name('index');

    Route::get('/create', CreateController::class)->name('create');

    Route::post('/store', StoreController::class)->name('store');

    Route::get('/{id}', ShowController::class)->name('show');

    Route::get('/{id}/edit', EditController::class)->name('edit');

    Route::put('/{id}', UpdateController::class)->name('update');

    Route::delete('/{id}', DestroyController::class)->name('destroy');
});

Route::resource('majors', MajorController::class);
