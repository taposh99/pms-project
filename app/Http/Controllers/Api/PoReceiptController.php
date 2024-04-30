<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestPoReceipt;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\JsonResponse;
use App\Helpers\FileHelper;
use App\Models\PoReceipt;
use Illuminate\Support\Facades\DB;

class PoReceiptController extends Controller
{
    public function getAllPoReceipt(): JsonResponse
    {
        try {
            $poReceipt = PoReceipt::with('supplier', 'product', 'division', 'district', 'country')->orderBy('id', 'desc')->get();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Po Receipt List found!!', '200', $poReceipt);
    }

    public function getPoReceipt($poReceipt): JsonResponse
    {
        try {
            $poReceipt = PoReceipt::with('supplier', 'product', 'division', 'district', 'country')->findOrFail($poReceipt);
            return sendSuccessResponse('Po Receipt Found Successfully!!', '200', $poReceipt);
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
    }

    public function storePoReceipt(RequestPoReceipt $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            PoReceipt::create([
                'product_id' => $request->product_id,
                'supplier_id' => $request->supplier_id,
                'due_date' => $request->due_date,
                'payment_status' => $request->payment_status,
                'purchase_order' => $request->purchase_order,
                'division_id' => $request->division_id,
                'district_id' => $request->district_id,
                'country_id' => $request->country_id,
                'area' => $request->area,
                'zip_code' => $request->zip_code,

            ]);
            DB::commit();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('PO Receipts created Successfully!!', '200');
    }

    public function updatePoReceipt(RequestPoReceipt $request, PoReceipt $poReceipt): JsonResponse
    {
        try {
            DB::beginTransaction();
            $poReceipt->update([
                'product_id' => $request->product_id,
                'supplier_id' => $request->supplier_id,
                'due_date' => $request->due_date,
                'payment_status' => $request->payment_status,
                'purchase_order' => $request->purchase_order,
                'division_id' => $request->division_id,
                'district_id' => $request->district_id,
                'country_id' => $request->country_id,
                'area' => $request->area,
                'zip_code' => $request->zip_code,
            ]);
            DB::commit();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Update Successfully!!', '200');
    }

    public function deletePoReceipt(PoReceipt $poReceipt): JsonResponse
    {
        try {
            $poReceipt->delete();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('PO Receipts Order Delete Successfully!!', '200');
    }
}
