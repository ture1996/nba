<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TeamsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\NewsController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [TeamsController::class,'index']);

Route::get('/teams/{id}', [TeamsController::class, 'show'])->name('single-team');

Route::get('players/{id}', [PlayersController::class, 'show'])->name('single-player');

Route::get('/register', [RegisterController::class, 'create']);

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'create'])->name('login');

Route::post('/login', [LoginController::class, 'store']);

Route::get('/logout', [LoginController::class, 'destroy']);

Route::post('/teams/{id}/comment', [CommentsController::class, 'store'])->middleware('no.bad.words');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/logout');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/news', [NewsController::class, 'index']);

Route::get('/news/create', [NewsController::class, 'create']);

Route::post('/news/create', [NewsController::class, 'store']);

Route::get('/news/{id}', [NewsController::class, 'show'])->name('single-news');

Route::get('/news/team/{name}', [NewsController::class, 'filter']);


