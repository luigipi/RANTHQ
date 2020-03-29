<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MembersResources extends JsonResource
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
            "member_id" => $this->id,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "email" => $this->email,
            "phone_number" => $this->phone_number,
            "role" => $this->role,
            "profile_photo" => $this->avatar,
            "is_active" => $this->is_active,
            "status" => $this->status,
            "created_at" => (string) $this->created_at,
            "updated_at" => (string) $this->updated_at,
            "posts" => PostResources::collection($this->posts),
        ];
    }
}
