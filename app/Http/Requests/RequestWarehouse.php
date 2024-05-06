<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;


class RequestWarehouse extends FormRequest
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
            'house' => 'required',
            'email' => 'required|unique:warehouses',
            'phone' => 'required',
            'email' => ['required', 'email', 'max:255', Rule::unique('warehouses')->ignore($this->warehouse)],
            'name' => ['required', Rule::unique('warehouses')->ignore($this->warehouse)->where(function ($query) {
                    return $query->where('name', $this->name);
                }),
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'name ' . $this->name . ' has already been taken.',
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
