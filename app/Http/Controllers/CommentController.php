<?php

namespace App\Http\Controllers;

use App\Http\Request\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller {
    public function store($postId, CommentRequest $request) {
        $data = $request->validated();

        if (!array_key_exists('email', $data)) {
            $data['email'] = Auth::user()->email;
        }

        \Log::debug('Added comment', $data);

        Comment::create([
            'author_email' => $data['email'] ?? Auth::user()->email,
            'message' => $data['message'],
            'post_id' => $postId,
            'published_at' => now(),
        ]);

        return redirect()->route('blog.show', $postId);
    }
}
