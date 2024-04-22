<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
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

Route::post('login', [AuthController::class, 'login']);
// Route::post('register', [AuthController::class, 'register']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

    /**
     * Product Category
     */
    Route::get('/category', [CategoryController::class, 'getAllCategory']);
    Route::get('/category/{category}', [CategoryController::class, 'getCategory']);
    Route::post('/category', [CategoryController::class, 'storeCategory']);
    Route::put('/category/{category}', [CategoryController::class, 'updateCategory']);
    Route::delete('/category/{category}', [CategoryController::class, 'deleteCategory']);
});
