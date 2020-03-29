<?php
namespace App\Services;

use App\Repositories\PostsRepository;

class PostsServices {
    protected $postRepo;

    public function __construct(PostsRepository $postRepo) {
        $this->postRepo = $postRepo;
    }

    public function index() {
        return $this->postRepo->posts();
    }

    public function newPost($request) {
        return $this->postRepo->make_post($request);
    }
}