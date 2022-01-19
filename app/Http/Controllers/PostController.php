<?php

namespace App\Http\Controllers;

use App\Http\Request\PostRequest;
use App\Models\Post;
use App\Services\ModelLogger;
use App\Services\PostCreator;
use Illuminate\Http\Request;

class PostController extends Controller {
    public function newPost() {
        return view('blog.new_post');
    }

    public function showPost($id, Request $request, ModelLogger $logger) {
        $post = Post::findOrFail($id);
        $comments = Post::findOrFail($id)->comments()->orderBy('published_at', 'DESC')->paginate(5);

        $logger->logModel($request->user(), $post);

        return view('blog.post.post', [
            'post' => $post,
            'comments' => $comments,
        ]);
    }

    public function store(PostRequest $request, PostCreator $creator) {
        $data = $request->validated();

        $creator->addPost($data);

        return redirect()->route('blog')->with('status', 'Post created successfully!');
    }
}
