<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestDistrict;
use App\Models\District;
use Exception;
use Illuminate\Http\JsonResponse;

class DistrictController extends Controller
{
    public function getAllDistrict(): JsonResponse
    {
        try {
            $district = District::with('division')->get();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('District List found!!', '200', $district);
    }



    public function getDistrict(District $district)
    {
        try {
            return sendSuccessResponse('District Found Successfully!!', '200', $district->load('division'));
        } catch (Exception $exception) {

            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
    }


    public function storeDistrict(RequestDistrict $request): JsonResponse
    {

        try {
            District::create([
                'division_id' => $request->division_id,
                'name'         => $request->name,
            ]);
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('District created Successfully!!', '200');
    }

    public function updateDistrict(RequestDistrict $request, District $district): JsonResponse
    {
        try {
            $district->update([
                'division_id' => $request->division_id,
                'name'        => $request->name,
            ]);
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('District Update Successfully!!', 200);
    }

    public function deleteDistrict(District $district): JsonResponse
    {
        try {
            $district->delete();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('District Delete Successfully!!', '200');
    }
}
