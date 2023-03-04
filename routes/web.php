<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
    return redirect('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/movie/{movie_id}', [App\Http\Controllers\MovieController::class, 'index'])->name('movie.index');

Route::post('/watchlist/{movie_id}', [App\Http\Controllers\WatchlistController::class, 'store'])->name('watchlist.store');
Route::get('/isWatchlisted/{movie_id}', [App\Http\Controllers\WatchlistController::class, 'isWatchlisted'])->name('watchlist.isWatchlisted');

Route::get('/review/{movie_id}/rate', [App\Http\Controllers\ReviewController::class, 'index'])->name('review.index');
Route::post('/review/{movie_id}', [App\Http\Controllers\ReviewController::class, 'store'])->name('review.store');
Route::patch('/review/{movie_id}', [App\Http\Controllers\ReviewController::class, 'update'])->name('review.update');
Route::delete('/review/{movie_id}', [App\Http\Controllers\ReviewController::class, 'delete'])->name('review.delete');
Route::get('/review/average/{movie_id}', function(int $movie_id){
    return DB::table('reviewed_movies')->where("movie_id","=",$movie_id)->avg('review') ?? 0.0;
})->withoutMiddleware([EnsureTokenIsValid::class]);
Route::get('/review/isReviewed/{movie_id}', [App\Http\Controllers\ReviewController::class, 'isReviewed']);
