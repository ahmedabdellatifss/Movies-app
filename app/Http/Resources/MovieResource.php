<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=> $this->title,
            'discription'=> substr($this->discription,0 , 50) . '...',
            'rate'=> $this->rate,
            'category_id'=> $this->category_id,
            'image_path'=> $this->image_path,
            'created_at' => $this->created_at->toDateString()
        ];
    }
}
