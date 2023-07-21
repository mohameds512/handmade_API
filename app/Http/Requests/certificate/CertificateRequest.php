<?php

namespace App\Http\Requests\certificate;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CertificateRequest extends FormRequest
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
       if($this->status != null){
               $rules= [
                   'status' => 'required',
               ];

               return $rules;
       }
       else{
           $user =Auth::user();
           $isAdmin =$user->hasRole('admin');
           if($isAdmin){
               $rules= [
                   'user_id' => 'required|exists:users,id',
               ];

               return $rules;
           }
           $rules= [
               'service_id' => 'required|exists:services,id',
               'quantity'=>'required|numeric',
               'apply_to'=>'required',
               'name'=>'required|regex:/^[a-zA-ZÑñ\s]+$/',
               'phone'=>'required|numeric',
               'image'=>'image|mimes:jpeg,png,jpg,gif,svg',
           ];

           return $rules;
       }
    }

    public function messages()
    {
        return [
            'service_id.required'=>[
                "ar"=>"نوع الخدمه مطلوب",
                "en"=>"Service is required"
            ],
            'service_id.exists'=>[
                "ar"=>"ليست موجوده",
                "en"=>"Not Found"
            ],
            'quantity.required'=>[
                "ar"=>"العدد مطلوب",
                "en"=>"Quantity is required"
            ],
            'phone.required'=>[
                "ar"=>"الهاتف مطلوب",
                "en"=>"Phone is required"
            ],
            'phone.numeric'=>[
                "ar"=>"يجب أن يكون رقم",
                "en"=>"Phone must be Number"
            ],
            'quantity.numeric'=>[
                "ar"=>"يجب أن يكون رقم",
                "en"=>"Quantity must be Number"
            ],
            'apply_to.required'=>[
                "ar"=>"الجهة الموجهة لها مطلوب",
                "en"=>"Apply To is required"
            ],
            'name.required'=>[
                "ar"=>"الاسم باللغه الانجليزية مطلوب",
                "en"=>"English Name is required"
            ],
            'name.regex'=>[
                "ar"=>"يجب ان يكون بالانجليزي",
                "en"=>"Must be in English"
            ],
            'image.image'=>[
                "ar"=>"صيغه صورة مطلوب",
                "en"=>"Must be image"
            ],
        ];
    }


}
