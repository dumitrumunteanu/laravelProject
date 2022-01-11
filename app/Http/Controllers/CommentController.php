<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller {
    public function store($postId) {
        Comment::create([
            'author_email' => request()->email ?? Auth::user()->email,
            'message' => request()->message,
            'post_id' => $postId,
            'published_at' => now(),
        ]);

        return redirect(route('blog.show', $postId));
    }
}
