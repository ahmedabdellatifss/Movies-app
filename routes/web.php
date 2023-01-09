<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Movie;
use App\Http\Resources\MovieResource;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    $NewMovies = MovieResource::collection(Movie::all());
    return Inertia::render('Dashboard', compact('NewMovies'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','isAdmin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route for Users
Route::middleware(['auth','isAdmin'])->group(function () {
    Route::resource('users', UserController::class);

});

// Route for Movies
Route::middleware(['auth','isAdmin'])->group(function () {
    //Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::resource('movies', MovieController::class);
    Route::inertia('create', 'CreateMovie')->name('pages.create');

});

// Route for Categories
Route::middleware(['auth','isAdmin'])->group(function () {
    Route::resource('categories', CategoryController::class);

});

