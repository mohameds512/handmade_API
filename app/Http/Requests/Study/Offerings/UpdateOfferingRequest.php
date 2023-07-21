<?php

namespace App\Http\Requests\Study\Offerings;

use App\Models\Study\Offering;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOfferingRequest extends FormRequest
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
            'term_id'                   => 'required|exists:terms,id',
            'programs'                  => 'required',
            'linked_offering_id'        => 'integer',
            'linked_exam_offering_id'   => 'integer',
            'status'                    => Offering::STATUS_CONTROL_DRAFT

        ];
    }
}
