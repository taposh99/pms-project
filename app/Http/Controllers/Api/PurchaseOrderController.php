<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\JsonResponse;
use App\Helpers\FileHelper;
use App\Http\Requests\RequestPurchaseOrder;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\DB;

class PurchaseOrderController extends Controller
{
    public function getAllPurchaseOrder(): JsonResponse
    {
        try {
            $purchaseOrder = PurchaseOrder::with('product', 'supplier', 'department')->orderBy('id', 'desc')->get();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Purchase Order List found!!', '200', $purchaseOrder);
    }

    public function getPurchaseOrder($purchaseOrder): JsonResponse
    {
        try {
            $purchaseOrder = PurchaseOrder::with('product', 'supplier', 'department')->findOrFail($purchaseOrder);
            return sendSuccessResponse('Purchase Order Found Successfully!!', '200', $purchaseOrder);
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
    }

    public function storePurchaseOrder(RequestPurchaseOrder $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            PurchaseOrder::create([
                'product_id' => $request->product_id,
                'supplier_id' => $request->supplier_id,
                'department_id' => $request->department_id,
                'due_date' => $request->due_date,
                'issue_date' => $request->issue_date,
                'price' => $request->price,
                'sending_status' => $request->sending_status,
                'payment_status' => $request->payment_status,
                'purchase_status' => $request->purchase_status,

            ]);
            DB::commit();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Purchase Order created Successfully!!', '200');
    }

    public function updatePurchaseOrder(RequestPurchaseOrder $request, PurchaseOrder $purchaseOrder): JsonResponse
    {
        try {
            DB::beginTransaction();
            $purchaseOrder->update([
                'product_id' => $request->product_id,
                'supplier_id' => $request->supplier_id,
                'department_id' => $request->department_id,
                'due_date' => $request->due_date,
                'issue_date' => $request->issue_date,
                'price' => $request->price,
                'sending_status' => $request->sending_status,
                'payment_status' => $request->payment_status,
                'purchase_status' => $request->purchase_status,
            ]);
            DB::commit();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Update Successfully!!', '200');
    }

    public function deletePurchaseOrder(PurchaseOrder $purchaseOrder): JsonResponse
    {
        try {
            $purchaseOrder->delete();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Purchase Order Delete Successfully!!', '200');
    }
}
