<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestWarehouse;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\JsonResponse;
use App\Helpers\FileHelper;
use App\Models\Warehouse;
use Illuminate\Support\Facades\DB;


class WarehouseController extends Controller
{

    public function getAllWarehouse(): JsonResponse
    {
        try {
            $warehouse = Warehouse::with('division', 'district','country')->orderBy('id', 'desc')->get();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Warehouse List found!!', '200', $warehouse);
    }

    public function getWarehouse($warehouse): JsonResponse
    {
        try {
            $warehouse = Warehouse::with('division', 'district','country')->findOrFail($warehouse);
            return sendSuccessResponse('Warehouse Found Successfully!!', '200', $warehouse);
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
    }

    public function storeWarehouse(RequestWarehouse $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            Warehouse::create([
                'name'             => $request->name,
                'house'            => $request->house,
                'division_id'      => $request->division_id,
                'district_id'      => $request->district_id,
                'country_id'       => $request->country_id,
                'area'             => $request->area,
                'zip_code'         => $request->zip_code,
                'email'            => $request->email,
                'contact_person'   => $request->contact_person,
                'phone'            => $request->phone,
            ]);
            DB::commit();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Warehouse created Successfully!!', '200');
    }

    public function updateWarehouse(RequestWarehouse $request, Warehouse $warehouse): JsonResponse
    {
        try {
            DB::beginTransaction();
            $warehouse->update([
                'name'             => $request->name,
                'house'            => $request->house,
                'division_id'      => $request->division_id,
                'district_id'      => $request->district_id,
                'country_id'       => $request->country_id,
                'area'             => $request->area,
                'zip_code'         => $request->zip_code,
                'email'            => $request->email,
                'contact_person'   => $request->contact_person,
                'phone'            => $request->phone,
            ]);
            DB::commit();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Warehouse Successfully!!', '200');
    }

    public function deleteWarehouse(Warehouse $warehouse): JsonResponse
    {
        try {
            $warehouse->delete();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Warehouse Delete Successfully!!', '200');
    }
}
