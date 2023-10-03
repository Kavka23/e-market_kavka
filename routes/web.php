<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanBarangController;
use App\Http\Controllers\ExcelImportController;
use App\Models\PengajuanBarang;
use Illuminate\Support\Facades\Route;

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


Route::get('/home', [DashboardController::class, 'home']);
// Route :: get('/blog',[DashboardController::class,'blog']);
Route::resource('/pengajuan', PengajuanBarangController::class);
Route::get('pengajuan/export/excel', [PengajuanBarangController::class, 'export']);
Route::get('/import', [ExcelImportController::class, "index"])->name('import.index');
Route::post('/import', [ExcelImportController::class, 'import'])->name('import');
