<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function (): void {
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
});

Route::middleware('auth')->group(function (): void {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Jurusan routes - custom routes BEFORE resource
    Route::get('/jurusan/export-csv', [JurusanController::class, 'exportExcel'])->name('jurusan.export-csv');
    Route::get('/jurusan/print', [JurusanController::class, 'print'])->name('jurusan.print');
    Route::resource('jurusan', JurusanController::class)->except('show');
    
    // Mahasiswa routes - custom routes BEFORE resource
    Route::get('/mahasiswa/export-csv', [MahasiswaController::class, 'exportExcel'])->name('mahasiswa.export-csv');
    Route::get('/mahasiswa/print', [MahasiswaController::class, 'print'])->name('mahasiswa.print');
    Route::resource('mahasiswa', MahasiswaController::class)->except('show');
    
    // Matakuliah routes - custom routes BEFORE resource
    Route::get('/matakuliah/export-csv', [MatakuliahController::class, 'exportExcel'])->name('matakuliah.export-csv');
    Route::get('/matakuliah/print', [MatakuliahController::class, 'print'])->name('matakuliah.print');
    Route::resource('matakuliah', MatakuliahController::class)->except('show');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
