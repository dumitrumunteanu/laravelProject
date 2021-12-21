<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index() {
        if (Auth::check()) {
            $posts = Auth::user()->posts()->get();
        }
        else {
            $posts = Post::orderBy('published_at', 'DESC')->get()->all();
        }
        return view('blog.blog', ['posts' => $posts]);
    }

    public function newPost() {
        return view('blog.new_post');
    }

    public function showPost($id) {
        $post = Post::findOrFail($id);
        $comments = Post::findOrFail($id)->comments()->orderBy('published_at', 'DESC')->get();

        return view('blog.post.post', ['post' => $post], ['comments' => $comments]);
    }
}
