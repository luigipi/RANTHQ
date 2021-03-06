<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResources extends JsonResource
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
            "post_id" => $this->id,
            "post_body" => $this->body,
            "created_at" => (string) $this->created_at,
            "updated_at" => (string) $this->updated_at,
            "comments" =>  CommentsResource::collection($this->comments), 
        ];
    }
}
