<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaApi;
use App\Http\Controllers\AuthController;

Route::apiResource('mahasiswa', MahasiswaApi::class, ['names' => [
    'index' => 'api.mahasiswa.index',
    'show' => 'api.mahasiswa.show',
]]);