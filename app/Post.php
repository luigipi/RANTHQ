<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "ranthq_posts";
    //protected $foreignKey = "member_id";
    protected $fillable = [
        "member_id",
        "body",
        "tags",
        "is_active",
        "status",
    ];

    public function member() {
        return $this->belongsTo(Member::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class, "post_id");
    }
}
