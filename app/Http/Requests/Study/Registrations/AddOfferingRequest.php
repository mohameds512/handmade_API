<?php

namespace App\Http\Requests\Study\Registrations;

use Illuminate\Foundation\Http\FormRequest;

class AddOfferingRequest extends FormRequest
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
            'offering_id' => 'required|exists:offerings,id',
            'section_id' => 'required|exists:sections,id',
            'offering_id2' => 'exists:offerings,id',
            'section_id2' => 'exists:sections,id',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [

        ];
    }
}
