<?php

namespace App\Http\Requests\Purchases;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BillRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
        // if (Gate::allows('purchases')){
        // return true ;
        // }
        // return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
//            'number' => ['nullable', Rule::unique('bills')->ignore(request('id'))],
            'code' => ['nullable', Rule::unique('bills')->ignore(request('id'))],

            'billed_at' => 'required|date',
            'due_at' => 'required|date',
            'vendor_id' => 'required|numeric|exists:vendors,id',
            'status_id' => 'required|numeric|exists:statuses,id',
            'tax_id' => 'required|numeric|exists:taxes,id',
            'notes' => 'nullable',

            'paid' => 'nullable|numeric', // sometimes|gt:0
            'discount' => 'nullable|numeric',
            'sub_total' => 'nullable|numeric',
            'tax_total' => 'nullable|numeric',
            'total' => 'nullable|numeric',

            'billItems.*.name' => 'required',
            'billItems.*.product_id' => 'nullable|numeric',
            'billItems.*.description' => 'nullable',

            'billItems.*.quantity' => 'required|numeric|min:0|max:10000',
            'billItems.*.price' => 'required|numeric|min:0',
        ];
    }
}
