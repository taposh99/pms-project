<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestDepartment;
use App\Models\Department;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\JsonResponse;

class DepartmentController extends Controller
{
    public function getAllDepartment(): JsonResponse
    {
        try {
            $department = Department::orderBy('id', 'desc')->get();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Department List found!!', '200', $department);
    }


    public function getDepartment($department): JsonResponse
    {

        try {
            $department = Department::findOrFail($department);

            return sendSuccessResponse('department Found!!', '200', $department);
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
    }

    public function storeDepartment(RequestDepartment $request): JsonResponse
    {
        try {
            Department::create([
                'name' => $request->name,
            ]);
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Department create Successfully!!', '200');
    }

    public function updateDepartment(RequestDepartment $request, Department $department): JsonResponse
    {
        try {
            $department->update([
                'name' => $request->name,
            ]);
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Update Successfully!!', '200');
    }

    public function deleteDepartment(Department $department): JsonResponse
    {
        try {
            $department->delete();
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Delete Successfully!!', '200');
    }
}
