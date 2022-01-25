<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller {
    public function index() {
        if (Auth::check()) {
            return redirect()->route('courses');
        }
        else {
            $popularPosts = Post::select([
                'posts.id',
                'posts.title',
                'posts.description',
                DB::raw('count(comments.id) as comment_count'),
            ])->join('comments', 'comments.post_id', '=', 'posts.id')
                ->groupBy('posts.id', 'posts.title', 'posts.description')
                ->orderByDesc('comment_count')
                ->limit(4)->get();

            return view('welcome', ['popularPosts' => $popularPosts]);
        }
    }
}
