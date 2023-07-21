<?php

namespace App\Http\Requests\Purchases;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreVendorRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'nullable|numeric|exists:vendors,id',
            'business_name' => 'string|required',
            'first_name' => 'string|required',
            'last_name' => 'string|nullable',
            'code' => ['nullable', Rule::unique('vendors')->ignore(request('id'))],
            'phone' => 'required|numeric',
            'telephone' => 'nullable|numeric',
            'country_id' => 'required|numeric|exists:countries,id',
            'state_id' => 'required|numeric|exists:states,id',
            'city' => 'nullable|string',
            'address' => 'nullable|string',
            'email' => 'nullable|email',
            'cr' => 'nullable|string',
            'tax_number' => 'nullable|numeric',
            'opening_balance' => 'nullable|string',
            'opening_balance_date' => 'required_with:opening_balance|string',
            'active' => 'nullable|boolean',
        ];
    }
}
