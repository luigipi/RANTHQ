<?php 
namespace App\Repositories;
use App\Post;
use App\Comment;

class CommentsRepository {
    protected $post;
    protected $comment;

    public function __construct(Post $post, Comment $comment) {
        $this->post = $post;
        $this->comment = $comment;
    }

    public function comment($post_id, $request) {
        $post = $this->post->find($post_id)->id;
        $comment = $this->comment->create([
            "post_id" => $post,
            "member_id" => 9,
            "comment" => $request->comment,
            "parent" => $post,
            "is_available" => 1
        ]);
    }

    public function update($comment_id, array $request) {
        $comment = $this->comment->find($comment_id);
        $update = $comment->update($request);
        if($update) {
            return response()->json($update);
        }
    }

    public function delete($comment_id) {
        $comment = $this->comment->find($comment_id);

        if($comment) {
            return response()->json($comment);
        }

        return response()->json("Error deleting comment");
    }
}