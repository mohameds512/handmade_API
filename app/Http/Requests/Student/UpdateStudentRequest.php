<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'father_name'=>'required|string|max:255',
            'father_job'=>'required|string|max:255',
            'father_job_phone'=>'required|max:20',
            'parent_email'=>'required|email:rfc',
            'father_job_description'=>'nullable|string|max:255',
            'birth_country_id'=>'required',
            'birth_city_local'=>'required|string|max:255',
            'program_id'=>'required',
            'level_id'=>'required',
            'first_term_id'=>'required|numeric|lte:term_id',
            'term_id'=>'required|numeric|gte:first_term_id',
            'advisor_id'=>'required',
            'prestudy_name'=>'required|string|max:255',
            'prestudy_type'=>'nullable',
            "prestudy_info"=>'nullable|string|max:255|',
            "prestudy_marks"=>'required|max:2000|lte:prestudy_max_marks',
            'prestudy_max_marks'=>'required|max:2000|gte:prestudy_marks',
        ];
    }

    public function messages()
    {
        return [
            'father_name.required'=>[
                "ar"=>"اسم الاب مطلوب",
                "en"=>"Father name required"
            ],
            'father_name.string'=>[
                "ar"=>"يجب ادخال حروف فقط في حقل اسم الاب",
                "en"=>"String only accepted in father name field"
            ],
            'father_name.max'=>[
                "string"=>[
                "ar"=>"الحد الاقصي لحقل اسم الاب 255",
                "en"=>"max length for father name is 255"
            ]
            ],
            'father_job.required'=>[
                "ar"=>"وظيفة الاب مطلوبه",
                "en"=>"Father job required"
            ],

            'father_job.max'=>[
                "string"=>[
                "ar"=>"الحد الاقصي لحقل وظيفة الاب 255",
                "en"=>"max length for father job is 255"
                ]
            ],

            'father_job_phone.required'=>[
                "ar"=>"رقم تليفون الاب مطلوب",
                "en"=>"Father's job Phone is required"
            ],
            'father_job_phone.string'=>[
                "ar"=>"يجب ادخال ارقام فقط في حقل رقم تليفون الاب",
                "en"=>"String only accepted in father job field"
            ],
            'father_job_phone.max'=>[
                "string"=>[
                "ar"=>"الحد الاقصي لحقل تليفون الاب 20",
                "en"=>"max length for father's job phone is 20"
                ]
            ],
            'parent_email.required'=>[
                "ar"=>"يجب ادخال البريد الالكتروني للاب",
                "en"=>"Father email field is required"
            ],
            'parent_email.email'=>[
                "ar"=>"يجب ان يكون الحقل عباره عن بريد",
                "en"=>"Field must be an email"
            ],
            'father_job_description.string'=>[
                "ar"=>"يجب ادخال حروف فقط في حقل وصف وظيفه الاب",
                "en"=>"String only accepted in father job description field"
            ],
            'father_job_description.max'=>[
                "string"=>[
                "ar"=>"الحد الاقصي لحقل وصف وظيفه الاب 255",
                "en"=>"max length for father job description is 255"
                ]
            ],
            'birth_country_id.required'=>[
                "ar"=>"يجب ادخال بلد الميلاد",
                "en"=>"Country field is required"
            ],

            'birth_city_local.required'=>[
                "ar"=>"يجب ادخال ميدنة الميلاد ",
                "en"=>"Birth city local field is required"
            ],
            'birth_city_local.string'=>[
                "ar"=>"يجب ادخال حروف فقط في مدينة الميلاد",
                "en"=>"String only accepted in birth citylocal field"
            ],
            'birth_city_local.max'=>[
                "string"=>[
                "ar"=>"الحد الاقصي لحقل  مدينة الميلا 255",
                "en"=>"max length for birth city local is 255"
                ]
            ],
            'program_id.required'=>[
                "ar"=>"يجب إدخال حقل البرنامج ",
                "en"=>"Program field is required"
            ],


            'level_id.required'=>[
                "ar"=>"يجب إدخال حقل المستوي ",
                "en"=>"Level field is required"
            ],

            'term_id.required'=>[
                "ar"=>"يجب إدخال حقل الترم الحالي ",
                "en"=>"Current term field is required"
            ],

            'first_term_id.required'=>[
                "ar"=>"يجب إدخال حقل ترم الالتحاق ",
                "en"=>"Admission term field is required"
            ],
            'term_id.gte'=>[
                'numeric'=>[
                    "en"=>"Current term must be after or equal first term",
                    "ar"=>"يجب ان يكون حقل الترم الحالي بعد ترم الالتحاق او يساويه"
                ]
            ],

            'first_term_id.lte'=>[
                'numeric'=>[
                    "en"=>"Admission term must be before or equal current term",
                    "ar"=>"يجب ان يكون حقل ترم الالتحاق قبل الترم الحالي او يساويه"
                ]
            ],

            'advisor_id.required'=>[
                "ar"=>"يجب إدخال حقل المرشد الاكاديمي",
                "en"=>"advisor field is required"
            ],

            'prestudy_name.required'=>[
                "ar"=>"يجب ادخال اسم الدراسه السابقه ",
                "en"=>"Prestudy name field is required"
            ],
            'prestudy_name.string'=>[
                "ar"=>"يجب ادخال حروف فقط في الدراسه السابقه",
                "en"=>"String only accepted in birth prestudy name field"
            ],
            'prestudy_name.max'=>[
                "string"=>[
                "ar"=>"الحد الاقصي لحقل  اسم الدراسه السابقه 255",
                "en"=>"max length for prestudy name is 255"
                ]
            ],
            'prestudy_marks.required'=>[
                "ar"=>"يجب ادخال درجة الدراسه السابقه ",
                "en"=>"Prestudy name field is required"
            ],
            'prestudy_marks.string'=>[
                "ar"=>"يجب ادخال حروف فقط في درجات الدراسه السابقه",
                "en"=>"String only accepted in birth prestudy name field"
            ],
            'prestudy_marks.max'=>[
                "numeric"=>[
                "ar"=>"الحد الاقصي لحقل  درجه الدراسه السابقه 5",
                "en"=>"max length for prestudy marks is 5"
                ]
            ],
            'prestudy_max_marks.required'=>[
                "ar"=>"يجب ادخال الحد الاقصي لدرجة الدراسه السابقه ",
                "en"=>"prestudy max marks field is required"
            ],
            'prestudy_max_marks.max'=>[
                "numeric"=>[
                "ar"=>"الحد الاقصي لحقل الحد الاقصي لدرجه الدراسه السابقه 5",
                "en"=>"max length for prestudy max marks is 5"
                ]
            ],
            'prestudy_info.max'=>[
                "string"=>[
                "ar"=>"الحد الاقصي لحقل معلومات الدراسه السابقه 255",
                "en"=>"max length for prestudy info is 255"
                ]
            ],
            'prestudy_marks.lte'=>[
                'numeric'=>[
                "en"=>"The prestudy marks must be less than or equal to max prestudy marks",
                "ar"=>"يجب ان يكون حقل درجة الدراسه السابقه اقل من او يساوي حقل الدرجه القصوي للدراسه السابقه"
                ]
                ],
            'prestudy_max_marks.gte'=>[
                'numeric'=>[
                "en"=>"The prestudy marks must be greater than or equal to max prestudy marks",
                "ar"=>"يجب ان يكون حقل درجة الدراسه السابقه القصوي اكبر من او يساوي حقل درجه الدراسه السابقه"
           ]
            ]


        ];
    }


}
