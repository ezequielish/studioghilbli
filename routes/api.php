<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
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
Route::middleware("auth.basic")->post('/login', [LoginController::class, 'user_token']);

Route::controller(UserController::class)->group(function () {
    Route::post('/user', 'create_update');
    Route::middleware(['auth:sanctum', 'ability:user_edit'])->put('/user/update', 'create_update');
    Route::middleware(['auth:sanctum', 'ability:user_delete'])->delete('/user', 'delete_user');
});

