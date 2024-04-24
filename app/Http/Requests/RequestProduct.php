<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;

class RequestProduct extends FormRequest
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

            'category_id' => 'required',
            'price' => 'required',
            'name' => 'required',
            'issue_date' => 'required',
            'images' => 'nullable|mimes:jpg,jpeg,png,gif',
            'product_id' => [
                'required',
                Rule::unique('products')->where(function ($query) {
                    return $query->where('product_id', $this->product_id);
                }),
            ],

        ];
    }
    public function messages()
    {
        return [
            'product_id.unique' => 'product id ' . $this->product_id . ' has already been taken.',
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
