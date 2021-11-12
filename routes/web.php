<?php

use App\Http\Controllers\CoachController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ClubController;
use \App\Http\Controllers\PlayerController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\Auth\LoginController;


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

Route::get('/', function(){
    return view('index');
})->name('index');

Route::group(['middleware'=>'reg'], function(){
    Route::resource('club', ClubController::class);
    Route::resource('player', PlayerController::class);
    Route::resource('coach', CoachController::class);
});
Route::group(['prefix'=>'admin', 'middleware'=>'role:admin'], function(){
    Route::get('/dashboard', [AdminController::class, 'showAllUsers'])->name('admin.index');
    Route::get('/roles/{id}', [AdminController::class, 'giveRole'])->name('admin.roles');
    Route::post('/store', [AdminController::class, 'storeRole'])->name('admin.store');
    Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('admin.destroy');
});

Route::fallback(function (){
   return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Socialite routes for Google

Route::get('/login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback']);
