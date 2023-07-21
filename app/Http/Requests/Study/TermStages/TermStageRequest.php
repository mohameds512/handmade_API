<?php

namespace App\Http\Requests\Study\TermStages;

use Illuminate\Foundation\Http\FormRequest;

class TermStageRequest extends FormRequest
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
            
            'term_id'=>'required|exists:terms,id',
            'bylaw_id'=>'required|exists:bylaws,id',
            'faculty_id'=>'required|exists:faculties,id',
            'programs'=>'array',
            'min_gpa'=>'required|max:4|min:0',
            'stage_code_id'=>'required|exists:stage_codes,id',
            'start_date'=>'required|date',
            'end_date'=>'required|date',
        ];
    }
}
