<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;
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


Route::post('/pengaduan/store', [PengaduanController::class, 'store'])->name('pengaduan.store');
Route::get('/pengaduan/status', [PengaduanController::class, 'status'])->name('pengaduan.status');
Route::get('/pengaduan/{id}', [PengaduanController::class, 'show'])->name('pengaduan.show');
Route::get('/', function () {
    return view('welcome');
});
