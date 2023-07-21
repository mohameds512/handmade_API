<?php

namespace App\Http\Requests\Users\UserAccess;

use Illuminate\Foundation\Http\FormRequest;

class UserAccessUpdateRequest extends FormRequest
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
            'access.*.role_id'   => 'required|exists:roles,id',
            'access.*.faculty_id'   => 'required|exists:faculties,id',
            //'access.*.department_id'   => 'exists:departments,id',
            //'access.*.programs.*.programs_id'   => 'exists:programs,id',
            //'access.*.programs.*.access_id'   => 'exists:user_access,id',
        ];

    }
}
