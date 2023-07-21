<?php

namespace App\Http\Requests\Users\Instructors;

use Illuminate\Foundation\Http\FormRequest;

class RemoveDepartmentLinkRequest extends FormRequest
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
            'instructor_id'   => 'required|exists:instructors,id',
            'department_id'   => 'required|exists:departments,id',
        ];

    }
}
