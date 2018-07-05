<?php

namespace App\Http\Resources;

use App\Gym;
use App\Instructor;
use Illuminate\Http\Resources\Json\JsonResource;

class Sessions extends JsonResource
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
        return [
            'exerciseType' => $this->exerciseType,
            'Sets' => $this->Sets,
            'gymName'=> Gym::find($this->gym_id)->name,
            'InstructorName'=> Instructor::find($this->instructor_id)->name,
        ];
    }

}
