<?php

namespace App\Http\Resources\Patient;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            
                'name'          => $this->name,
                'phone_number'  => $this->phone_number,
                'email'         => $this->email,
                'address'       => $this->address,
        ];
    }
}
