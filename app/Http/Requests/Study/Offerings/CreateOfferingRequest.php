<?php

namespace App\Http\Requests\Study\Offerings;

use Illuminate\Foundation\Http\FormRequest;

class CreateOfferingRequest extends FormRequest
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
            'term_id'   => 'required|exists:terms,id',
            'courses'   => 'required',
        ];
    }
}
