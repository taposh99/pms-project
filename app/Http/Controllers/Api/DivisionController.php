<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestDivision;
use App\Models\Division;
use Exception;
use Illuminate\Http\JsonResponse;

class DivisionController extends Controller
{
    public function getAllDivision(): JsonResponse
    {
        try {
            $division = Division::orderBy('id', 'desc')->get();

        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Division List found!!', '200', $division);

    }


    public function getDivision(Division $division): JsonResponse
    {
        try {
            return sendSuccessResponse('Division Found Successfully!!', '200', $division);
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }

    }

    public function storeDivision(RequestDivision $request): JsonResponse
    {
        try {
            Division::create([
                'name' => $request->name,
            ]);

        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Division create Successfully!!', '200');

    }

    public function updateDivision(RequestDivision $request, Division $division): JsonResponse
    {
        try {
            $division->update([
                'name' => $request->name,
            ]);
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Division Update Successfully!!', '200');


    }

    public function deleteDivision(Division $division): JsonResponse
    {
        try {
            $division->delete();

        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse(' Division Delete Successfully!!', '200');

    }
}
