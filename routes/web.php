<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PTNController;

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
Route::post('/', [PTNController::class, 'store']);
Route::put('/', [PTNController::class, 'update']);
Route::delete('/', [PTNController::class, 'destroy']);

Route::get('/about', function () {
    return view('about');
});
Route::get('/admin', function () {
    return view('admin');
})->middleware('auth');
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/create', [PTNController::class, 'create']);
Route::get('/edit/{ptn}', [PTNController::class, 'edit']);
Route::get('/{ptn}', [PTNController::class, 'show']);