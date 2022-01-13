<?php

namespace App\Http\Controllers;

use App\Http\Request\CommentRequest;
use App\Services\Creator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller {
    public function store($postId, CommentRequest $request, Creator $creator) {
        $data = $request->validated();
        if (!array_key_exists('email', $data)) {
            $data['email'] = Auth::user()->email;
        }

        $creator->addComment($data, $postId);

        return redirect()->route('blog.show', $postId);
    }
}
