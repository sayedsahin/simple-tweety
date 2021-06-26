<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\TweetLikeController;

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


Route::middleware('auth')->group(function() {
    Route::get('/', [TweetController::class, 'index'])->name('home');
	Route::post('/tweets', [TweetController::class, 'store']);
	Route::post('profile/{user:username}/follow', [FollowController::class, 'store']);

	Route::get('profile/{user:username}/edit', [ProfileController::class, 'edit'])->middleware('can:edit,user');
	Route::patch('profile/{user:username}', [ProfileController::class, 'update'])->middleware('can:edit,user');
	Route::get('explore', ExploreController::class);

	Route::post('tweets/{tweet}/like', [TweetLikeController::class, 'store']);
	Route::delete('tweets/{tweet}/like', [TweetLikeController::class, 'distroy']);

});

Route::get('profile/{user:username}', [ProfileController::class, 'show'])->name('profile');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/test', function() {
	return auth()->user()->first()->follows;
    $a->auth()->user()->follows;
});