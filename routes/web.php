<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PTNController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [PTNController::class, 'index']);
Route::post('/', [PTNController::class, 'store'])->middleware('auth');

Route::get('/about', function () {
    return view('about');
});
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');
Route::post('/login', [AdminController::class, 'authenticate']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::get('/login', [AdminController::class, 'login'])->name('login');

Route::get('/create', [PTNController::class, 'create'])->middleware('auth');
Route::get('/edit/{ptn}', [PTNController::class, 'edit'])->middleware('auth');
Route::delete('/{ptn}', [PTNController::class, 'destroy'])->middleware('auth');
Route::get('/{ptn}', [PTNController::class, 'show']);
Route::put('/{ptn}', [PTNController::class, 'update'])->middleware('auth');