<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PackagingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use Illuminate\Auth\Middleware\Authenticate;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthenticationController::class, 'logout']);
    // unit
    Route::post('/unit', [UnitController::class, 'store']);
    Route::patch('/unit/{id}', [UnitController::class, 'update'])->middleware('pemilik');
    Route::delete('/unit/{id}', [UnitController::class, 'destroy'])->middleware('pemilik');

    // packaging
    Route::post('/packaging', [PackagingController::class, 'store']);
    Route::patch('/packaging/{id}', [PackagingController::class, 'update'])->middleware('pemilik-packaging');
    Route::delete('/packaging/{id}', [PackagingController::class, 'destroy'])->middleware('pemilik-packaging');
});

Route::get('/units', [UnitController::class, 'index']);
Route::get('/packagings', [PackagingController::class, 'index']);
Route::post('/login', [AuthenticationController::class, 'login']);
