<?php

namespace App\Http\Requests\Study\Offerings;

use App\Models\Study\Offering;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
        if($this->offering && $this->offering->status==Offering::STATUS_NOT_COMPLETED_EDIT){
            //echo $this->offering->status;
            return [
                // 'course_id'=>'required|exists:courses,id',
                'term_id'   => 'required|exists:terms,id',
                'programs'   => 'required',
                'main_offering_id'   => 'integer',
                'exam_offering_id'   => 'integer',

            
            ];
        }else{
            return [
                'programs'          => 'required',
                'main_offering_id'  => 'integer',
                'exam_offering_id'  => 'integer',
          
            ];
        }

    }
}
