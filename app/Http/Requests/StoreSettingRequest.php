<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'default_language' => 'sometimes|nullable',
            'currency' => 'sometimes|nullable',
            'default_taxes' => 'sometimes|nullable|array',

            'company_name' => 'sometimes|required',
            'phone' => 'sometimes|required',
            'email' => 'sometimes|required',
            'address' => 'sometimes|required',
            'city' => 'sometimes|nullable',
            'website' => 'sometimes|nullable',

            'company_logo' => 'sometimes|required|image|max:2048',

            'working_days' => 'sometimes|required|numeric|min:1',
            'working_hours' => 'sometimes|required|numeric|min:1',
            'is_all_salaries' => 'sometimes|nullable',

            'avg_salary' => 'sometimes|required|numeric|gt:0',

            'number_prefix' => 'sometimes|nullable',
            'due_to_days' => 'sometimes|required',
            'is_element_last_price' => 'sometimes|nullable',
            'is_product_last_price' => 'sometimes|nullable',

            'color' => 'sometimes|nullable',
            'show_item_description' => 'sometimes|required',
            'show_logo' => 'sometimes|required',
            'invoice_notes' => 'sometimes|nullable',
            'invoice_footer' => 'sometimes|nullable',
            'price_offer_notes' => 'sometimes|nullable',
            'price_offer_footer' => 'sometimes|nullable',

        ];
    }
}
