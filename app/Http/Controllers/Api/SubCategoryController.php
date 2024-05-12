<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestSubCategory;
use App\Models\SubCategory;
use Exception;
use Illuminate\Http\JsonResponse;

class SubCategoryController extends Controller
{
    public function getAllSubCategory(): JsonResponse
    {
        try {
            $subcategory = SubCategory::with('category')->orderBy('id', 'desc')->get();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Sub Category List found!!', '200', $subcategory);
    }



    public function getSubCategory($subCategory): JsonResponse
    {
        try {
            $subCategory = SubCategory::with('category')->findOrFail($subCategory);
            return sendSuccessResponse('Sub Category Found Successfully!!', '200', $subCategory);
        } catch (Exception $exception) {

            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
    }



    public function storeSubCategory(RequestSubCategory $request): JsonResponse
    {

        try {
            SubCategory::create([
                'category_id' => $request->category_id,
                'name' => $request->name,
            ]);
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Sub Category created Successfully!!', '200');
    }

    public function updateSubCategory(RequestSubCategory $request, SubCategory $subCategory): JsonResponse
    {
        try {
            $subCategory->update([
                'category_id' => $request->category_id,
                'name' => $request->name,
            ]);
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Sub Category Update Successfully!!', 200);
    }

    public function deleteSubCategory(SubCategory $subCategory): JsonResponse
    {
        try {
            $subCategory->delete();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Sub Category Delete Successfully!!', '200');
    }
}
