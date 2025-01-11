<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WalkthroughController;
use App\Http\Controllers\LikeController;

Route::get('/', [WalkthroughController::class, 'index'])->name('index');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');



?>

