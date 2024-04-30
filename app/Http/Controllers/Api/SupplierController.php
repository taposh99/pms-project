<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\JsonResponse;
use App\Helpers\FileHelper;
use App\Http\Requests\RequestSupplier;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function getAllSupplier(): JsonResponse
    {
        try {
            $supplier = Supplier::with('supplierCategory', 'division', 'district','country')->orderBy('id', 'desc')->get();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Supplier List found!!', '200', $supplier);
    }

    public function getSupplier($supplier): JsonResponse
    {
        try {
            $supplier = Supplier::with('supplierCategory', 'division', 'district','country')->findOrFail($supplier);
            return sendSuccessResponse('Supplier Found Successfully!!', '200', $supplier);
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
    }

    public function storeSupplier(RequestSupplier $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            Supplier::create([
                'supplier_category_id'    => $request->supplier_category_id,
                'supplier_name'           => $request->supplier_name,
                'contact_person'          => $request->contact_person,
                'company_name'            => $request->company_name,
                'currency'                => $request->currency,
                'deferred_payment_terms'  => $request->deferred_payment_terms,
                'area'                    => $request->area,
                'zip_code'                => $request->zip_code,
                'division_id'             => $request->division_id,
                'district_id'             => $request->district_id,
                'country_id'              => $request->country_id,
                'payment_terms'           => $request->payment_terms,
                'supplier_code'           => $request->supplier_code,
            ]);
            DB::commit();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Supplier created Successfully!!', '200');
    }

    public function updateSupplier(RequestSupplier $request, Supplier $supplier): JsonResponse
    {
        try {
            DB::beginTransaction();
            $supplier->update([
                'supplier_category_id'    => $request->supplier_category_id,
                'supplier_name'           => $request->supplier_name,
                'contact_person'          => $request->contact_person,
                'company_name'            => $request->company_name,
                'currency'                => $request->currency,
                'deferred_payment_terms'  => $request->deferred_payment_terms,
                'area'                    => $request->area,
                'zip_code'                => $request->zip_code,
                'division_id'             => $request->division_id,
                'district_id'             => $request->district_id,
                'country_id'              => $request->country_id,
                'payment_terms'              => $request->payment_terms,
                'supplier_code'              => $request->supplier_code,
            ]);
            DB::commit();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Update Successfully!!', '200');
    }

    public function deleteSupplier(Supplier $supplier): JsonResponse
    {
        try {
            $supplier->delete();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Supplier Delete Successfully!!', '200');
    }
}
