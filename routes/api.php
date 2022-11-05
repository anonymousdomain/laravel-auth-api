<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\TokenController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('auth/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function () {
    Route::get('auth/user', [TokenController::class, 'user']);
    Route::get('user/posts', [PostController::class, 'index']);
    Route::delete('auth/token/delete', [TokenController::class, 'destroy']);
});
Route::post('user/register', [RegisterController::class, 'store']);
Route::post('auth/token', [TokenController::class, 'store']);

