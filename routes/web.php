<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{BarangController,AuthController};

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'process']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::resource('/barang', BarangController::class)->middleware('auth');

Route::get('/myHome', [AuthController::class, 'myHome'])->middleware('auth');
// Route::get('/print-barang', [BarangController::class, 'printBarang'])->middleware('auth');





