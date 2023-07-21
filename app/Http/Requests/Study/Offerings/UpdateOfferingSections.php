<?php

namespace App\Http\Requests\Study\Offerings;

use App\Models\Study\Offering;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOfferingSections extends FormRequest
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
        // if($this->offering && $this->offering->statu == Offering::STATUS_NOT_COMPLETED_EDIT){
            //echo $this->offering->status;
            return [
                'num_groups' => 'required|integer',
                'num_sections' => 'required|integer',
                'students_quota' => 'required|integer',
                'students_over_quota' => 'required|integer'
                // 'max_sections_in_group' => 'required|integer',
            ];


        // }else{
        //     return [
               
        //         'max_total'   => 'integer',
        //         'num_groups' => 'integer',
        //         'num_sections' => 'integer',
        //         'students_quota' => 'integer',
        //         'students_over_quota' => 'integer'
        //     ];
        // }

    }
}
