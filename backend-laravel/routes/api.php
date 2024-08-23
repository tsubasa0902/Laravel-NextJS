<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\OperatingHourController;
use App\Http\Controllers\SpecialOperatingHourController;
use App\Http\Controllers\SpecialClosureController;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
// 一般ユーザーもアクセス可能
Route::apiResource('reservations', ReservationController::class);

// 管理者のみアクセス可能 後から調整する
// Route::middleware(['auth:api', 'admin'])->group(function () {
    Route::apiResource('menus', MenuController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('offices', OfficeController::class);
    Route::apiResource('operating_hours', OperatingHourController::class);
    Route::apiResource('special_operating_hours', SpecialOperatingHourController::class);
    Route::apiResource('special_closures', SpecialClosureController::class);
// });
