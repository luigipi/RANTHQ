<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "ranthq_comments";
    protected $fillable = [
        "post_id",
        "member_id",
        "comment",
        "parent",
        "is_available"
    ];

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function replies() {
        return $this->hasMany(self::class, "parent", "id");
    }
}
