<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WalkthroughController;
use App\Http\Controllers\LikeController;


Route::get('/', [WalkthroughController::class, 'index'])->name('index');

Route::resource('walkthroughs', WalkthroughController::class);

Route::get('like/{walkthroughId}', [LikeController::class, 'like'])->name('like');

Auth::routes();

Route::get('/home', [WalkthroughController::class, 'index'])->name('index');



?>

