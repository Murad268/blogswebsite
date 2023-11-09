<?php

use App\Http\Controllers\front\BlogController;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\LoginController;
use App\Http\Controllers\front\ResgisterController;
use App\Http\Controllers\front\USERController;
use App\Http\Controllers\front\WriteController;
use App\Http\Controllers\MailController;
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

Route::group(['prefix' => 'user', 'as' => 'front.user.'], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login_check', [LoginController::class, 'login_check'])->name('login_check');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/register', [ResgisterController::class, 'index'])->name('register');
    Route::post('/register_add', [ResgisterController::class, 'register_add'])->name('register_add');
});

Route::group(['middleware' => 'auth', 'prefix' => '', 'as' => 'front.'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');


    Route::get('/blog', [BlogController::class, 'index'])->name('blog');
    Route::get('/blog/{slug}', [BlogController::class, 'index'])->name('blog');
    Route::get('/blog/like/{id}', [BlogController::class, 'like'])->name('like');
    Route::get('/blog/dislike/{id}', [BlogController::class, 'dislike'])->name('dislike');

    Route::post('/blog/comment/{id}', [BlogController::class, 'comment'])->name('comment');
    Route::get('/blog/comment_delete/{id}', [BlogController::class, 'comment_delete'])->name('comment_delete');










    Route::get('/blogs/{slug?}', [BlogController::class, 'blogs'])->name('blogs');



    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::get('/user', [USERController::class, 'index'])->name('user');
    Route::get('/edit_user', [USERController::class, 'edit_user'])->name('edit_user');
    Route::post('/update_user', [USERController::class, 'update_user'])->name('update_user');
    Route::get('/edit_pass', [USERController::class, 'edit_pass'])->name('edit_pass');
    Route::post('/update_pass', [USERController::class, 'update_pass'])->name('update_pass');




    Route::get('/write', [WriteController::class, 'index'])->name('write');
    Route::post('/write_block', [WriteController::class, 'write_block'])->name('write_block');



    Route::post('/mail', [MailController::class, 'send'])->name('mail');
    Route::post('/weekly', [MailController::class, 'weekly'])->name('weekly');

});
