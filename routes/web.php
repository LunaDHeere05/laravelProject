<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WalkthroughController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserManagementController;


Route::get('/', [WalkthroughController::class, 'index'])->name('index');

Route::resource('walkthroughs', WalkthroughController::class);

Route::get('like/{walkthroughId}', [LikeController::class, 'like'])->name('like');
Route::get('like-post/{postId}', [LikeController::class, 'likePost'])->name('like.post');

Route::get('user/{id}', [UserController::class, 'profile'])->name('profile');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/admin', [UserManagementController::class, 'index'])->name('admin.index');
    Route::post('/admin', [UserManagementController::class, 'store'])->name('admin.store');
    Route::post('/admin/promote/{id}', [UserManagementController::class, 'promote'])->name('admin.promote');
});

Route::resource('users', UserController::class);

Route::resource('posts', PostController::class);

Route::resource('FAQ', FAQController::class);

Route::resource('contacts', ContactController::class);

Route::get('/home', [WalkthroughController::class, 'index'])->name('index');



?>

