<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'id'=>$this->id,
            'user_id'=>$this->user_id,
            'status_id'=>$this->status_id,
            'title'=>$this->title,
            'description'=>$this->description,
            'status'=>[
                'name'=>$this->status->name
            ],

        ];
    }
}
