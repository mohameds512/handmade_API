<?php

namespace App\Http\Requests\Services\Excuses;

use Illuminate\Foundation\Http\FormRequest;

class ExcusesRequest extends FormRequest
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
        $rules= [

            'term_id'=>'nullable|numeric',
            'offerings' => 'nullable|array',
            'excuse_type_id'=>'required|numeric',
            'reason'=>'required',
            'file' => 'nullable|mimes:jpeg,png,jpg,pdf|max:20480',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'term_id.numeric'=>[
                "ar"=>"يجب أن يكون رقم",
                "en"=>"must be Number"
            ],
            'excuse_type_id.required'=>[
                "ar"=>"مطلوب",
                "en"=>"required"
            ],
            'excuse_type_id.string'=>[
                "ar"=>"يجب أن يكون رقم",
                "en"=>"must be Number"
            ],
            'reason.required'=>[
                "ar"=>"السبب مطلوب",
                "en"=>"reason required"
            ],
            'file.required'=>[
                "ar"=>"الملف مطلوب",
                "en"=>"file required"
            ],

        ];
    }
}
