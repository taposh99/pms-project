<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\JsonResponse;
use App\Helpers\FileHelper;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getAllProduct(): JsonResponse
    {
        try {
            $product = Product::with('category', 'subCategory', 'division', 'district')->orderBy('id', 'desc')->get();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Product List found!!', '200', $product);
    }

    public function getProduct($product): JsonResponse
    {
        try {
            $product = Product::with('category', 'subCategory', 'division', 'district')->findOrFail($product);
            return sendSuccessResponse('Product Found Successfully!!', '200', $product);
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
    }
    public function storeProduct(RequestProduct $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            Product::create([
                'product_code'     => $request->product_code,
                'name'             => $request->name,
                'category_id'      => $request->category_id,
                'sub_category_id'  => $request->sub_category_id,
                'division_id'      => $request->division_id,
                'district_id'      => $request->district_id,
                'issue_date'       => $request->issue_date,
                'price'            => $request->price,
                'warehouse_name'   => $request->warehouse_name,
                'area'             => $request->area,
                'zip_code'         => $request->zip_code,
                'image'             => uploadFile($request->file('images'), 'image'),
            ]);
            DB::commit();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Product created Successfully!!', '200');
    }

    public function updateProduct(RequestProduct $request, Product $product): JsonResponse
    {
        try {
            DB::beginTransaction();
            $product->update([
                'product_code'     => $request->product_code,
                'name'             => $request->name,
                'category_id'      => $request->category_id,
                'sub_category_id'  => $request->sub_category_id,
                'division_id'      => $request->division_id,
                'district_id'      => $request->district_id,
                'issue_date'       => $request->issue_date,
                'price'            => $request->price,
                'warehouse_name'   => $request->warehouse_name,
                'area'             => $request->area,
                'zip_code'         => $request->zip_code,
                'image'             => uploadFile($request->file('images'), 'image'),
            ]);
            DB::commit();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Update Successfully!!', '200');
    }

    public function deleteProduct(Product $product): JsonResponse
    {
        try {
            $product->delete();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Product Delete Successfully!!', '200');
    }
}
