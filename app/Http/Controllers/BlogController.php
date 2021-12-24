<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller {
    public function index() {
        $request = request()->all();

        // default sorting
        $sortBy = 'published_at';
        $sortOrder = 'desc';

        if (array_key_exists('sort', $request)) {
            global $sortBy, $sortOrder;

            $args = explode('_', $request['sort']);
            $sortBy = $args[0] === 'date' ? 'published_at' : 'title';
            $sortOrder = $args[1];
        }

        if (array_key_exists('author', $request)) {
            $posts = Auth::user()->posts()->orderBy($sortBy, $sortOrder)->paginate(6);

            $posts->appends([
                'author' => 'me',
                'sort' => ($sortBy === 'published_at' ? 'date' : 'title') . '_' . $sortOrder,
                'page' => $request['page'] ?? '1',
            ]);
        }
        else {
            $posts = Post::orderBy($sortBy, $sortOrder)->paginate(6);

            $posts->appends([
                'sort' => ($sortBy === 'published_at' ? 'date' : 'title') . '_' . $sortOrder,
                'page' => $request['page'] ?? '1',
            ]);
        }

        return view('blog.blog', ['posts' => $posts]);
    }
}
