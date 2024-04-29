<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\JsonResponse;

class CountryController extends Controller
{
    public function getAllCountry(): JsonResponse
    {
        try {
            $country = Country::orderBy('id', 'desc')->get();

        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
        return sendSuccessResponse('Country List found!!', '200', $country);

    }


    public function getCountry(Country $country): JsonResponse
    {
        try {
            return sendSuccessResponse('Country Found Successfully!!', '200', $country);
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }

    }
}
