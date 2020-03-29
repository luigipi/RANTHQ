<?php 
namespace App\Repositories;
use App\Post;
use App\Comment;
use App\Http\Resources\PostResources;

class CommentsRepository {
    protected $post;
    protected $comment;

    public function __construct(Post $post, Comment $comment) {
        $this->post = $post;
        $this->comment = $comment;
    }

    public function comment($post_id, $request) {

        $request->comment_id ? $comment_id = $request->comment_id : $comment_id = null;
        $post = $this->post->findOrFail($post_id);
        $comment = $this->comment->create([
            "post_id" => $post->id,
            "member_id" => 9,
            "comment" => $request->comment,
            "parent" => $comment_id,
            "is_available" => 1
        ]);
        if($comment) {
            return new PostResources($post);
        }
    }

    public function update($comment_id, array $request) {
        $comment = $this->comment->find($comment_id);
        $update = $comment->update($request);
        if($update) {
            return response()->json($comment);
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