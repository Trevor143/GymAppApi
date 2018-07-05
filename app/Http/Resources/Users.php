<?php

namespace App\Http\Resources;

use App\Gym;
use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class Users extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);

        return[
            'username'=> User::find($this->id)->name,
            'age'=>$this->age,
            'weight'=>$this->weight,
            'targetWeight'=>$this->targetWeight,
            'Preferred Gym'=>Gym::find($this->gym_id)->name,
        ];
    }
}
