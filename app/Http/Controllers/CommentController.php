<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommentsServices;

class CommentController extends Controller
{
    protected $commentservices;

    public function __construct(CommentsServices $commentservices) {
        $this->commentservices = $commentservices;
    }

    public function comment($post_id, Request $request) {
        return $this->commentservices->post_comment($post_id, $request);
    }
}
