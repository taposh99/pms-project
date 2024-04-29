<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestSupplierCategory;
use App\Models\SupplierCategory;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\JsonResponse;

class SupplierCategoryController extends Controller
{
    public function getAllSupplierCategory(): JsonResponse
    {
        try {
            $supplierCategory = SupplierCategory::orderBy('id', 'desc')->get();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse(' Supplier Category List found!!', '200', $supplierCategory);
    }


    public function getSupplierCategory($supplierCategory): JsonResponse
    {

        try {
            $supplierCategory = SupplierCategory::findOrFail($supplierCategory);

            return sendSuccessResponse('Supplier Category Found!!', '200', $supplierCategory);
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
    }



    public function storeSupplierCategory(RequestSupplierCategory $request): JsonResponse
    {
        try {
            SupplierCategory::create([
                'name' => $request->name,
            ]);
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Supplier Category create Successfully!!', '200');
    }

    public function updateSupplierCategory(RequestSupplierCategory $request, SupplierCategory $supplierCategory): JsonResponse
    {
        try {
            $supplierCategory->update([
                'name' => $request->name,
            ]);
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Update supplier category Successfully!!', '200');
    }

    public function deleteSupplierCategory(SupplierCategory $supplierCategory): JsonResponse
    {
        try {
            $supplierCategory->delete();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Delete Successfully!!', '200');
    }
}
