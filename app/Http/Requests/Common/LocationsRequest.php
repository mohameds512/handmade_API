<?php

namespace App\Http\Requests\Common;

use Illuminate\Foundation\Http\FormRequest;

class LocationsRequest extends FormRequest
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
            'name'=>'required|string|max:255',
            'name_local'=>'required|string|max:255',
            'building_id' => 'required|exists:buildings,id',
            'floor' => 'required|numeric',
            'capacity' => 'required|numeric',
            'sectors' => 'required|numeric',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required'=>[
                "ar"=>"الحقل مطلوب",
                "en"=>"field is required"
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
                "ar"=>"الحقل مطلوب",
                "en"=>"field is required"
            ],
            'name_local.string'=>[
                "ar"=>"يجب ادخال حروف فقط",
                "en"=>"String only accepted in field"
            ],
            'name_local.max'=>[
                "ar"=>"الحد الاقصي للحقل 255",
                "en"=>"max length is 255"
            ],
            'building_id.required'=>[
                "ar"=>"الحقل مطلوب",
                "en"=>"field is required"
            ],
            'building_id.exist'=>[
                "ar"=>"غير موجودة",
                "en"=>"Not found"
            ],
            'floor.required'=>[
                "ar"=>"الحقل مطلوب",
                "en"=>"field is required"
            ],
            'floor.numeric'=>[
                "ar"=>"يجب أن يكون رقم",
                "en"=>"must be number"
            ],
            'capacity.required'=>[
                "ar"=>"الحقل مطلوب",
                "en"=>"field is required"
            ],
            'capacity.numeric'=>[
                "ar"=>"يجب أن يكون رقم",
                "en"=>"must be number"
            ],
            'sectors.required'=>[
                "ar"=>"الحقل مطلوب",
                "en"=>"field is required"
            ],
            'sectors.numeric'=>[
                "ar"=>"يجب أن يكون رقم",
                "en"=>"must be number"
            ],

        ];
    }
}
