<?php 
namespace App\Services;

use App\Repositories\CommentsRepository;

class CommentsServices {
    protected $commentRepo;

    public function __construct(CommentsRepository $commentRepo) {
        $this->commentRepo = $commentRepo;
    }

    public function post_comment($post_id, $request) {
        return $this->commentRepo->comment($post_id, $request);
    }

    public function edit($comment_id, $request) {
        return $this->commentRepo->update($comment_id, $request);
    }

    public function delete($comment_id) {
        return $this->commentRepo->delete($comment_id);
    }
}