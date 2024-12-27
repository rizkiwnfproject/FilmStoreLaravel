<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\FilmCastController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\View;


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

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register/create', [AuthController::class, 'addRegister'])->name('register.create');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'getLogin'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/cast', [CastController::class, 'index'])->name('cast.index');
Route::get('/cast/{id}', [CastController::class, 'show'])->name('cast.show');

Route::get('/genre', [GenreController::class, 'index'])->name('genre.index');
Route::get('/genre/{id}', [GenreController::class, 'show'])->name('genre.show');

Route::get('/film', [FilmController::class, 'index'])->name('film.index');
Route::get('/film/{id}', [FilmController::class, 'show'])->name('film.show');

Route::get('/filmcast', [FilmCastController::class, 'index'])->name('film_cast.index');
Route::get('/filmcast/{id}', [FilmCastController::class, 'show'])->name('film_cast.show');

Route::get('/review', [ReviewController::class, 'index'])->name('review.index');
Route::get('/review/{id}', [ReviewController::class, 'show'])->name('review.show');
Route::get('/test', function () {
    return 'Hello, Laravel!';
});

Route::get('/table', [DashboardController::class, 'indexLogin'])->name('dashboard-data');
Route::middleware('auth')->group(function () {
    // Cast Routes
    Route::get('/cas/create', [CastController::class, 'create'])->name('cast.create');
    Route::post('/cast', [CastController::class, 'store'])->name('cast.store');
    Route::get('/cast/{id}/edit', [CastController::class, 'edit'])->name('cast.edit');
    Route::put('/cast/{id}', [CastController::class, 'update'])->name('cast.update');
    Route::delete('/cast/{id}', [CastController::class, 'destroy'])->name('cast.destroy');

    // Genre Routes
    Route::get('/genr/create', [GenreController::class, 'create'])->name('genre.create');
    Route::post('/genre', [GenreController::class, 'store'])->name('genre.store');
    Route::get('/genre/{id}/edit', [GenreController::class, 'edit'])->name('genre.edit');
    Route::put('/genre/{id}', [GenreController::class, 'update'])->name('genre.update');
    Route::delete('/genre/{id}', [GenreController::class, 'destroy'])->name('genre.destroy');

    // Film Routes
    Route::get('/fil/create', [FilmController::class, 'create'])->name('film.create');
    Route::post('/film', [FilmController::class, 'store'])->name('film.store');
    Route::get('/film/{id}/edit', [FilmController::class, 'edit'])->name('film.edit');
    Route::put('/film/{id}', [FilmController::class, 'update'])->name('film.update');
    Route::delete('/film/{id}', [FilmController::class, 'destroy'])->name('film.destroy');

    // Film_Cast Routes
    Route::get('/filmcas/create', [FilmCastController::class, 'create'])->name('film_cast.create');
    Route::post('/filmcast', [FilmCastController::class, 'store'])->name('film_cast.store');
    Route::get('/filmcast/{id}/edit', [FilmCastController::class, 'edit'])->name('film_cast.edit');
    Route::put('/filmcast/{id}', [FilmCastController::class, 'update'])->name('film_cast.update');
    Route::delete('/filmcast/{id}', [FilmCastController::class, 'destroy'])->name('film_cast.destroy');

    // Review Routes
    Route::get('/revie/create', [ReviewController::class, 'create'])->name('review.create');
    Route::post('/review', [ReviewController::class, 'store'])->name('review.store');
    Route::get('/review/{id}/reviews', [ReviewController::class, 'indexById'])->name('review.indexById');
    Route::get('/review/{id}/edit', [ReviewController::class, 'edit'])->name('review.edit');
    Route::put('/review/{id}', [ReviewController::class, 'update'])->name('review.update');
    Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');

    Route::get('/profile', [ProfilController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfilController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfilController::class, 'update'])->name('profile.update');
});
