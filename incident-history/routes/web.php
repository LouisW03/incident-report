<?php

use App\Http\Controllers\IncidentController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('report', [IncidentController::class, 'index'])->name('report.index');//menampilkan data mahasiswwa
Route::get('report/create', [IncidentController::class, 'create'])->name('report.create');//menampilkan form tambah data mahasiswa
Route::post('report', [IncidentController::class, 'store'])->name('report.store');//menyimpan data mahasiswa baru
Route::get('report/{incident}/edit', [IncidentController::class, 'edit'])->name('report.edit');//menampilkan form edit data mahasiswa
Route::put('report/{incident}', [IncidentController::class, 'update'])->name('report.update');// Route untuk mengupdate data mahasiswa
Route::get('report/{incident}/delete', [IncidentController::class, 'destroy'])->name('report.delete'); //menghapus data mahasiswa
Route::resource('report', IncidentController::class);