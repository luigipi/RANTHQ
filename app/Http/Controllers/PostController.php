<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostsServices;

class PostController extends Controller
{
    protected $postservice;

    public function __construct(PostsServices $postservice) {
        $this->postservice = $postservice;
    }

    public function index() {
        return $this->postservice->index();
    }

    public function create(Request $request) {
        return $this->postservice->newPost($request);
    }
}
