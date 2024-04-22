<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestCategory;
use App\Models\Category;
use Exception;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function getAllCategory(): JsonResponse
    {
        try {
            $category = Category::orderBy('id', 'desc')->get();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Category List found!!', '200', $category);
    }


    public function getCategory($category): JsonResponse
    {

        try {
            $category = Category::findOrFail($category);

            return sendSuccessResponse('Category Found!!', '200', $category);
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
    }

    public function storeCategory(RequestCategory $request): JsonResponse
    {
        try {
            Category::create([
                'name' => $request->name,
            ]);
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Category create Successfully!!', '200');
    }

    public function updateCategory(RequestCategory $request, Category $category): JsonResponse
    {
        try {
            $category->update([
                'name' => $request->name,
            ]);
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Update Successfully!!', '200');
    }

    public function deleteCategory(Category $category): JsonResponse
    {
        try {
            $category->delete();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Delete Successfully!!', '200');
    }
}
