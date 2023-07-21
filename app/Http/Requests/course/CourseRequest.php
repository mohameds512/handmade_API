<?php

namespace App\Http\Requests\course;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourseRequest extends FormRequest
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
            'name'=>'required|string|max:255',
            'name_local'=>'required|string|max:255',
            'faculty_id' => 'required|exists:faculties,id',
            'bylaw_id' => 'required|exists:bylaws,id',
            'code' => ['required','string', Rule::unique('courses', 'code')->ignore($this->course)],
       //     'co_requisites'=>'exists:courses,id'
            

        ];
    }

    public function messages()
    {
        return [
            'name.required'=>[
                "ar"=>"الاسم باللغة الانجليزية مطلوب",
                "en"=>"English Name required"
            ],
            'name.string'=>[
                "ar"=>"يجب ادخال حروف فقط",
                "en"=>"String only accepted in field"
            ],
            'name.max'=>[
                "ar"=>"الحد الاقصي للحقل 255",
                "en"=>"max length is 255"
            ],
            'name_local.required'=>[
                "ar"=>"الاسم باللغة العربية مطلوب",
                "en"=>"Arabic Name required"
            ],
            'name_local.string'=>[
                "ar"=>"يجب ادخال حروف فقط",
                "en"=>"String only accepted in field"
            ],
            'name_local.max'=>[
                "ar"=>"الحد الاقصي للحقل 255",
                "en"=>"max length is 255"
            ],
            'code.required'=>[
                "ar"=>"كود الجامعة مطلوب",
                "en"=>"English Name required"
            ],
            'code.string'=>[
                "ar"=>"يجب ادخال حروف فقط",
                "en"=>"String only accepted in field"
            ],
            'code.unique'=>[
                "ar"=>"مسّجل بالفعل",
                "en"=>"Already Exist"
            ],
            'faculty_id.required'=>[
                "ar"=>"الكلية مطلوبه",
                "en"=>"Faculty required"
            ],
            'faculty_id.exist'=>[
                "ar"=>"غير موجودة",
                "en"=>"Not found"
            ],
            'bylaw_id.required'=>[
                "ar"=>"اللائحة مطلوبة",
                "en"=>"Faculty required"
            ],
            'bylaw_id.exist'=>[
                "ar"=>"غير موجودة",
                "en"=>"Not found"
            ],

        ];
    }


}
