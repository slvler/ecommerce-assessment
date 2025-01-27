<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class OrderStoreRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
    public function authorize(): bool
    {
        return true;
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => $validator->errors()->first()
        ], 422));
    }
    public function rules(): array
    {
        return [
            'customerId' => 'required',
            'items' => 'required|array',
            'items.*.productId' => 'required',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unitPrice' => 'required',
            'items.*.total' => 'required',
            'total' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'customerId.required' => 'customerId is required',
            'items.required' => 'items is required',
            'items.*.productId.required' => 'items productId is required',
            'items.*.quantity.required' => 'items quantity is required',
            'items.*.unitPrice.required' => 'items unitPrice is required',
            'items.*.total.required' => 'items total is required',
            'total.required' => 'total is required',
        ];
    }
}
