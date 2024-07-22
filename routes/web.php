<?php

use App\Http\Controllers\AuthorsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UploadController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});


Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('login',[AuthController::class,'login_check'])->name('login_check');
Route::get('logout',[AuthController::class,'logout'])->name('logout');


Route::group(
    [
        'prefix'     => '/dashboard',
        'middleware' => ['IsAdmin'],
        'as'         => 'dashboard.'
    ],
    function () {

        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::resource('blogs', BlogsController::class);
        Route::resource('authors', AuthorsController::class);
        Route::post('/upload', [UploadController::class, 'uploadImage'])->name('upload');
    }
);
