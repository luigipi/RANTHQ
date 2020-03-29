<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    protected $fillable = [
        "first_name",
        "last_name",
        "gender",
        "email", 
        "password",
        "phone_number",
        "role",
        "avatar",
        "status",
        "is_active"
    ];
    protected $table = "ranthq_members";

    public function posts() {
        return $this->hasMany(Post::class, "member_id");
    }
}
