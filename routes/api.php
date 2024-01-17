<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WinningController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/winnings', [WinningController::class, 'index']);
Route::get('/winnings/{user_id}/{brand_id}/{part_id}', [WinningController::class, 'show']);
Route::post('/winnings', [WinningController::class, 'store']);
Route::delete('/winnings/{user_id}/{brand_id}/{part_id}', [WinningController::class, 'destroy']);
Route::put('/winnings/{user_id}/{brand_id}/{part_id}', [WinningController::class, 'update']);

Route::resource('/users', UserController::class);
Route::resource('/brands', BrandController::class);
Route::resource('/parts', PartController::class);
Route::resource('/products', ProductController::class);
