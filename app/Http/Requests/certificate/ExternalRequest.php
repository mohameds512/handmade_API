<?php

namespace App\Http\Requests\certificate;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ExternalRequest extends FormRequest
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
        if($this->certificate != null ){
        $rules= [
            'english_name' => 'required',
            'arabic_name' => 'required',
            'email' => 'required|email',
            'phone'=>'required|numeric',
            'graduation_year'=>'required|numeric',
            'student_code'=>'required|numeric',
            'faculty_id'=>'required||exists:faculties,id',
            'bylaw_id'=>'required||exists:bylaws,id',
            'program_id'=>'required||exists:programs,id',
            'services'=>'required||exists:services,id',
            'apply_to'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];

        return $rules;
        }else{
            $rules= [
                'email' => 'required|email'
                ];
            return $rules;
        }
    }

    public function messages()
    {
        return [
            'english_name.required'=>[
                "ar"=>" مطلوب",
                "en"=>"required"
            ],
        ];
    }


}
