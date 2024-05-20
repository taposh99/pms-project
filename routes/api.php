<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\DivisionController;
use App\Http\Controllers\Api\PoReceiptController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductTypeController;
use App\Http\Controllers\Api\PurchaseOrderController;
use App\Http\Controllers\Api\SubCategoryController;
use App\Http\Controllers\Api\SubCategotyController;
use App\Http\Controllers\Api\SupplierCategoryController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\WarehouseController;
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
Route::get('checkAuth', [AuthController::class, 'checkAuth'])->middleware('auth:sanctum');



Route::middleware('auth:sanctum')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);

    /**
     * Category Api
     */
    Route::get('category', [CategoryController::class, 'getAllCategory']);
    Route::get('category/{category}', [CategoryController::class, 'getCategory']);
    Route::post('category', [CategoryController::class, 'storeCategory']);
    Route::put('category/{category}', [CategoryController::class, 'updateCategory']);
    Route::delete('category/{category}', [CategoryController::class, 'deleteCategory']);

    /**
     * SubCategory API
     */
    Route::get('subcategory', [SubCategoryController::class, 'getAllSubCategory']);
    Route::get('subcategory/{subCategory}', [SubCategoryController::class, 'getSubCategory']);
    Route::post('subcategory', [SubCategoryController::class, 'storeSubCategory']);
    Route::put('subcategory/{subCategory}', [SubCategoryController::class, 'updateSubCategory']);
    Route::delete('subcategory/{subCategory}', [SubCategoryController::class, 'deleteSubCategory']);

    /**
     * Divison API
     */
    Route::get('division', [DivisionController::class, 'getAllDivision']);
    Route::get('division/{division}', [DivisionController::class, 'getDivision']);
    Route::post('division', [DivisionController::class, 'storeDivision']);
    Route::put('division/{division}', [DivisionController::class, 'updateDivision']);
    Route::delete('division/{division}', [DivisionController::class, 'deleteDivision']);

    /**
     * District API
     */

    Route::get('district', [DistrictController::class, 'getAllDistrict']);
    Route::get('district/{district}', [DistrictController::class, 'getDistrict']);
    Route::post('district', [DistrictController::class, 'storeDistrict']);
    Route::put('district/{district}', [DistrictController::class, 'updateDistrict']);
    Route::delete('district/{district}', [DistrictController::class, 'deleteDistrict']);

    /**
     * Product API
     */

    Route::get('product', [ProductController::class, 'getAllProduct']);
    Route::get('product/{product}', [ProductController::class, 'getProduct']);
    Route::post('product', [ProductController::class, 'storeProduct']);
    Route::put('product/{product}', [ProductController::class, 'updateProduct']);
    Route::delete('product/{product}', [ProductController::class, 'deleteProduct']);

    /**
     * Supplier Category API
     */

    Route::get('supplier-category', [SupplierCategoryController::class, 'getAllSupplierCategory']);
    Route::get('supplier-category/{supplierCategory}', [SupplierCategoryController::class, 'getSupplierCategory']);
    Route::post('supplier-category', [SupplierCategoryController::class, 'storeSupplierCategory']);
    Route::put('supplier-category/{supplierCategory}', [SupplierCategoryController::class, 'updateSupplierCategory']);
    Route::delete('supplier-category/{supplierCategory}', [SupplierCategoryController::class, 'deleteSupplierCategory']);


    /**
     * Country API
     */

    Route::get('country', [CountryController::class, 'getAllCountry']);
    Route::get('country/{country}', [CountryController::class, 'getCountry']);
    Route::post('country', [CountryController::class, 'storeCountry']);
    Route::put('country/{country}', [CountryController::class, 'updateCountry']);
    Route::delete('country/{country}', [CountryController::class, 'deleteCountry']);

    /**
     * Supplier API
     */

    Route::get('supplier', [SupplierController::class, 'getAllSupplier']);
    Route::get('supplier/{supplier}', [SupplierController::class, 'getSupplier']);
    Route::post('supplier', [SupplierController::class, 'storeSupplier']);
    Route::put('supplier/{supplier}', [SupplierController::class, 'updateSupplier']);
    Route::delete('supplier/{supplier}', [SupplierController::class, 'deleteSupplier']);

    /**
     * Purchase Order API
     */

    Route::get('purchase-order', [PurchaseOrderController::class, 'getAllPurchaseOrder']);
    Route::get('purchase-order/{purchaseOrder}', [PurchaseOrderController::class, 'getPurchaseOrder']);
    Route::post('purchase-order', [PurchaseOrderController::class, 'storePurchaseOrder']);
    Route::put('purchase-order/{purchaseOrder}', [PurchaseOrderController::class, 'updatePurchaseOrder']);
    Route::delete('purchase-order/{purchaseOrder}', [PurchaseOrderController::class, 'deletePurchaseOrder']);

    /**
     * Department Api
     */
    Route::get('department', [DepartmentController::class, 'getAllDepartment']);
    Route::get('department/{category}', [DepartmentController::class, 'getDepartment']);
    Route::post('department', [DepartmentController::class, 'storeDepartment']);
    Route::put('department/{department}', [DepartmentController::class, 'updateDepartment']);
    Route::delete('department/{department}', [DepartmentController::class, 'deleteDepartment']);

    /**
     * PO Receipts Api
     */
    Route::get('po-receipt', [PoReceiptController::class, 'getAllPoReceipt']);
    Route::get('po-receipt/{poReceipt}', [PoReceiptController::class, 'getPoReceipt']);
    Route::post('po-receipt', [PoReceiptController::class, 'storePoReceipt']);
    Route::put('po-receipt/{poReceipt}', [PoReceiptController::class, 'updatePoReceipt']);
    Route::delete('po-receipt/{poReceipt}', [PoReceiptController::class, 'deletePoReceipt']);


    /**
     * Warehouse API
     */

    Route::get('warehouse', [WarehouseController::class, 'getAllWarehouse']);
    Route::get('warehouse/{warehouse}', [WarehouseController::class, 'getWarehouse']);
    Route::post('warehouse', [WarehouseController::class, 'storeWarehouse']);
    Route::put('warehouse/{warehouse}', [WarehouseController::class, 'updateWarehouse']);
    Route::delete('warehouse/{warehouse}', [WarehouseController::class, 'deleteWarehouse']);

     /**
     * Product Type Api
     */
    Route::get('product-type', [ProductTypeController::class, 'getAllProductType']);
    Route::get('product-type/{productType}', [ProductTypeController::class, 'getProductType']);
    Route::post('product-type', [ProductTypeController::class, 'storeProductType']);
    Route::put('product-type/{productType}', [ProductTypeController::class, 'updateProductType']);
    Route::delete('product-type/{productType}', [ProductTypeController::class, 'deleteProductType']);
});
