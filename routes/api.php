<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DivisionController;
use App\Http\Controllers\Api\SubCategoryController;
use App\Http\Controllers\Api\SubCategotyController;
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
     * Category Api
     */
    Route::get('/category', [CategoryController::class, 'getAllCategory']);
    Route::get('/category/{category}', [CategoryController::class, 'getCategory']);
    Route::post('/category', [CategoryController::class, 'storeCategory']);
    Route::put('/category/{category}', [CategoryController::class, 'updateCategory']);
    Route::delete('/category/{category}', [CategoryController::class, 'deleteCategory']);

    /**
     * SubCategory API
     */
    Route::get('/subcategory', [SubCategoryController::class, 'getAllSubCategory']);
    Route::get('/subcategory/{subCategory}', [SubCategoryController::class, 'getSubCategory']);
    Route::post('/subcategory', [SubCategoryController::class, 'storeSubCategory']);
    Route::put('/subcategory/{subCategory}', [SubCategoryController::class, 'updateSubCategory']);
    Route::delete('/subcategory/{subCategory}', [SubCategoryController::class, 'deleteSubCategory']);

    /**
     * Divison API
     */
    Route::get('division', [DivisionController::class, 'getAllDivision']);
    Route::get('division/{division}', [DivisionController::class, 'getDivision']);
    Route::post('division', [DivisionController::class, 'storeDivision']);
    Route::put('division/{division}', [DivisionController::class, 'updateDivision']);
    Route::delete('division/{division}', [DivisionController::class, 'deleteDivision']);
});
