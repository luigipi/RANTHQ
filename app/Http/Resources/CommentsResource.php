<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentsResource extends JsonResource
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
            "post_id" => $this->post_id,
            "member_id" => $this->member_id,
            "comment" => $this->comment,
            "is_available" => $this->is_available,
            "created_at" => (string) $this->created_at,
            "updated_at" => (string) $this->updated_at,
            "replies" => $this->replies,
        ];
    }
}
