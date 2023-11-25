<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post("login", [\App\Http\Controllers\API\AuthController::class, "login"])->name("login");
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post("logout", [\App\Http\Controllers\API\AuthController::class, "logout"])->name("logout");
    Route::get("profile", [\App\Http\Controllers\API\UserController::class, "profile"])->name("profile");
    Route::resource("user", \App\Http\Controllers\API\UserController::class)->names("user");
});
