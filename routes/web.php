<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WalkthroughController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;


Route::get('/', [WalkthroughController::class, 'index'])->name('index');

Route::resource('walkthroughs', WalkthroughController::class);

Route::get('like/{walkthroughId}', [LikeController::class, 'like'])->name('like');
Route::get('user/{name}', [UserController::class, 'profile'])->name('profile');

Auth::routes();

Route::resource('users', UserController::class);

Route::resource('posts', PostController::class);

Route::get('/home', [WalkthroughController::class, 'index'])->name('index');



?>

