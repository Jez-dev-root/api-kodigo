<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\RatingController;
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

// Rutas públicas (Autenticación)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rutas protegidas (Requieren Token de Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // CRUD de Productos
    Route::apiResource('products', ProductController::class);

    // Endpoint para valoraciones y comentarios
    Route::post('products/{product}/ratings', [RatingController::class, 'store']);

    // Endpoint para reportes (Mejor valorado)
    Route::get('stats/best-rated-product', [ProductController::class, 'bestRatedProduct']);
});
