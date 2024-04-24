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
    public function storeProduct(RequestProduct $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            Product::create([
                'product_id'     => $request->product_id,
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
}
