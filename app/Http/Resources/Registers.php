<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Registers extends JsonResource
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
          'id'=>$request->id,
          'name'=>$request->name,
//          'access_token' =>$request->access_token,
        ];
    }
}
