<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemsInsertRequest extends FormRequest
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
            "element_id"    => "required|array",
            "amount"    => "required|array",
            "unit"    => "required|array",
            "expire_at"    => "required|array",

            "element_id.*"  => "required|numeric",
            "amount.*"  => "required|numeric",
            "unit.*"  => "required|numeric",
            "expire_at.*"  => "required|date|after:today",
        ];
    }
}
