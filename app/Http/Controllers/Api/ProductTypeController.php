<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestProductType;
use Illuminate\Http\Request;
use App\Http\Requests\RequestCategory;
use App\Models\ProductType;
use Exception;
use Illuminate\Http\JsonResponse;

class ProductTypeController extends Controller
{
    public function getAllProductType(): JsonResponse
    {
        try {
            $productType = ProductType::orderBy('id', 'desc')->get();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Product Type List found!!', '200', $productType);
    }


    public function getProductType($productType): JsonResponse
    {

        try {
            $productType = ProductType::findOrFail($productType);

            return sendSuccessResponse('Product Type Found!!', '200', $productType);
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
    }

    public function storeProductType(RequestProductType $request): JsonResponse
    {
        try {
            ProductType::create([
                'name' => $request->name,
            ]);
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Poduct Type create Successfully!!', '200');
    }

    public function updateProductType(RequestProductType $request, ProductType $productType): JsonResponse
    {
        try {
            $productType->update([
                'name' => $request->name,
            ]);
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Update Successfully!!', '200');
    }

    public function deleteProductType(ProductType $productType): JsonResponse
    {
        try {
            $productType->delete();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Delete Successfully!!', '200');
    }
}
