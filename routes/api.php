<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */
Route::middleware(["auth.basic", "verify-email"])->post('/login', [LoginController::class, 'user_token']);

Route::get("/refresh-token/{token}", [LoginController::class, 'refresh_token']);

Route::controller(UserController::class)->group(function () {
    Route::post('/user', 'create_update');
    Route::middleware(['auth:sanctum', 'ability:user_edit', 'verify-email'])->put('/user/update', 'create_update');
    Route::middleware(['auth:sanctum', 'ability:user_delete'])->delete('/user', 'delete_user');
});
