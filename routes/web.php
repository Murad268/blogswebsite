<?php

use App\Http\Controllers\front\BlogController;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\LoginController;
use App\Http\Controllers\front\ResgisterController;
use App\Http\Controllers\front\USERController;
use App\Http\Controllers\front\WriteController;
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

Route::group(['prefix' => '', 'as' => 'front.'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::get('/blog', [BlogController::class, 'index'])->name('blog');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::get('/register', [ResgisterController::class, 'index'])->name('register');
    Route::get('/user', [USERController::class, 'index'])->name('user');
    Route::get('/write', [WriteController::class, 'index'])->name('write');


});
