<?php

use App\Http\Controllers\penyewaController;
use App\Http\Controllers\pesananController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('penyewa.index');
// });

Route::get('/penyewa', [penyewaController::class, 'index'])->name('penyewa.index');
Route::get('/penyewa/add', [penyewaController::class, 'create'])->name('penyewa.create');
Route::post('/penyewa/store', [penyewaController::class, 'store'])->name('penyewa.store');
Route::get('/penyewa/edit/{id}', [penyewaController::class, 'edit'])->name('penyewa.edit');
Route::post('/penyewa/update/{id}', [penyewaController::class, 'update'])->name('penyewa.update');
Route::post('/penyewa/delete/{id}', [penyewaController::class, 'delete'])->name('penyewa.delete');
Route::get('/penyewa/search', [penyewaController::class, 'search'])->name('penyewa.search');
Route::get('/penyewa/trash', [penyewaController::class, 'trash'])->name('penyewa.trash');
Route::get('/penyewa/restore/{id}', [penyewaController::class, 'restore'])->name('penyewa.restore');
Route::get('/penyewa/search/trash', [tamuController::class, 'search_trash'])->name('penyewa.search_trash');
Route::post('/penyewa/hide/{id}', [penyewaController::class, 'hide'])->name('penyewa.hide');

Route::get('/pesanan', [pesananController::class, 'index'])->name('pesanan.index');
Route::get('/pesanan/add', [pesananController::class, 'create'])->name('pesanan.create');
Route::post('/pesanan/store', [pesananController::class, 'store'])->name('pesanan.store');
Route::get('/pesanan/edit/{id}', [pesananController::class, 'edit'])->name('pesanan.edit');
Route::post('/pesanan/update/{id}', [pesananController::class, 'update'])->name('pesanan.update');
Route::post('/pesanan/delete/{id}', [pesananController::class, 'delete'])->name('pesanan.delete');
Route::get('/pesanan/search', [pesananController::class, 'search'])->name('pesanan.search');
Route::get('/pesanan/trash', [pesananController::class, 'trash'])->name('pesanan.trash');
Route::get('/pesanan/restore/{id}', [pesananController::class, 'restore'])->name('pesanan.restore');
Route::get('/pesanan/search/trash', [pesananController::class, 'search_trash'])->name('pesanan.search_trash');
Route::post('/pesanan/hide/{id}', [pesananController::class, 'hide'])->name('pesanan.hide');

Route::get('/bus', [busController::class, 'index'])->name('bus.index');
Route::get('/bus/add', [busController::class, 'create'])->name('bus.create');
Route::post('/bus/store', [busController::class, 'store'])->name('bus.store');
Route::get('/bus/edit/{id}', [busController::class, 'edit'])->name('bus.edit');
Route::post('/bus/update/{id}', [busController::class, 'update'])->name('bus.update');
Route::post('/bus/delete/{id}', [busController::class, 'delete'])->name('bus.delete');
Route::get('/bus/search', [BusController::class, 'search'])->name('bus.search');
Route::get('/bus/trash', [busController::class, 'trash'])->name('bus.trash');
Route::get('/bus/restore/{id}', [busController::class, 'restore'])->name('bus.restore');
Route::get('/bus/search/trash', [tamuController::class, 'search_trash'])->name('bus.search_trash');
Route::post('/bus/hide/{id}', [busController::class, 'hide'])->name('bus.hide');

Route::get('/login', [LoginController::class, 'create'])->name('login.create');
Route::get('/login/store', [LoginController::class, 'store'])->name('login.store');

Route::get('/', [HomeController::class, 'index'])->name('home.index');

