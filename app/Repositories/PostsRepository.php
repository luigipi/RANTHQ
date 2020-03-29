<?php
namespace App\Repositories;

use App\Http\Resources\PostResources;
use App\Post;

class PostsRepository {
    protected $posts;

    public function __construct(Post $posts) {
        $this->posts = $posts;
    }

    public function posts() {
        return PostResources::collection($this->posts->orderBy("created_at", "desc")->paginate(20));
    }

    public function make_post($request) {
        $save = $this->posts->create([
            "member_id" => 9,
            "body" => $request->body,
            "tags" => "none",
            "is_active" => 1,
            "status" => "approved",
        ]);

        if($save) {
            return new PostResources($save);
        }
    }
}