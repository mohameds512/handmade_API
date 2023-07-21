<?php

namespace App\Http\Requests\Common;

use Illuminate\Foundation\Http\FormRequest;

class SlotsRequest extends FormRequest
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
            'period'=>'required|max:255',
            'regular_date_start'=>'required|date_format:Y-m-d H:i:s',
            'regular_date_end'=>'required|date_format:Y-m-d H:i:s|after:regular_date_start',
            'ramadan_date_start'=>'nullable|date_format:Y-m-d H:i:s',
            'ramadan_date_end'=>'nullable|date_format:Y-m-d H:i:s|after:ramadan_date_start',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'period.required'=>[
                "ar"=>"الحقل مطلوب",
                "en"=>"field is required"
            ],
            'period.max'=>[
                "ar"=>"الحد الاقصي للحقل 255",
                "en"=>"max length is 255"
            ],

            'regular_date_start.required'=>[
                "ar"=>"الحقل مطلوب",
                "en"=>"field is required"
            ],
            'regular_date_start.date_format'=>[
                "ar"=>" Y-m-d H:i:s الحقل لا يتطابق مع التنسيق",
                "en"=>"field does not match the format Y-m-d H:i:s"
            ],
            'regular_date_end.required'=>[
                "ar"=>"الحقل مطلوب",
                "en"=>"field is required"
            ],
            'regular_date_end.date_format'=>[
                "ar"=>" Y-m-d H:i:s الحقل لا يتطابق مع التنسيق",
                "en"=>"field does not match the format Y-m-d H:i:s"
            ],
            'regular_date_end.after'=>[
                "ar"=>" تاريخ الانتهاء يجب ان يكون بعد تاريخ البدأ",
                "en"=>"date end must be after date start"
            ],

            'ramadan_date_start.required'=>[
                "ar"=>"الحقل مطلوب",
                "en"=>"field is required"
            ],
            'ramadan_date_start.date_format'=>[
                "ar"=>" Y-m-d H:i:s الحقل لا يتطابق مع التنسيق",
                "en"=>"field does not match the format Y-m-d H:i:s"
            ],
            'ramadan_date_end.required'=>[
                "ar"=>"الحقل مطلوب",
                "en"=>"field is required"
            ],
            'ramadan_date_end.date_format'=>[
                "ar"=>" Y-m-d H:i:s الحقل لا يتطابق مع التنسيق",
                "en"=>"field does not match the format Y-m-d H:i:s"
            ],
            'ramadan_date_end.after'=>[
                "ar"=>" تاريخ الانتهاء يجب ان يكون بعد تاريخ البدأ",
                "en"=>"ramadan date end must be after ramadan date start"
            ],

        ];
    }
}
