<?php

namespace App\Http\Resources\Purchases;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VendorsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name'=> $this->first_name .' ' .$this->last_name ,
            'phone' => $this->phone,
            'code' => $this->code ,
            'email' => $this->email,
            'city' => $this->city .', ' . $this->state->name,
//            'business_name'
//'first_name'
//'last_name'
//'code'
//'telephone'
//'phone'
//'email'
//'address'
//'cr'
//'tax_id'
//'city'
//'state_id'
        ];
    }
}
