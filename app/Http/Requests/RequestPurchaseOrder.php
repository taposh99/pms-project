<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;

class RequestPurchaseOrder extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_id' => 'required',
            'supplier_id' => 'required',
            'department_id' => 'required',
            'due_date' => 'required',
            'issue_date' => 'required',
            'price' => 'required',
            'sending_status' => 'required',
            'payment_status' => 'required',
            'purchase_status' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors(); // Get the list of validation errors
        $firstErrorMessage = $errors->all()[0];
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => $firstErrorMessage,
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
