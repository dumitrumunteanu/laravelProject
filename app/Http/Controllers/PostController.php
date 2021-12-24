<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller {
    public function newPost() {
        return view('blog.new_post');
    }

    public function showPost($id) {
        $post = Post::findOrFail($id);
        $comments = Post::findOrFail($id)->comments()->orderBy('published_at', 'DESC')->get();

        return view('blog.post.post', [
            'post' => $post,
            'comments' => $comments,
        ]);
    }

    public function store() {
        $storeFileName = '';

        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $fileExt = $file->getClientOriginalExtension();
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $storeFileName = str_replace(' ', '_', $fileName . '_' . now() . '.' . $fileExt);
            $file->move('storage/blog_img', $storeFileName);
        }
        else {
            $storeFileName= 'defaultbg.png';
        }

        Post::create([
            'title' => request()->title,
            'description' => request()->description,
            'user_id' => Auth::user()->id,
            'image' => $storeFileName,
            'published_at' => now(),
        ]);

        return redirect(route('blog'))->with('status', 'Post created successfully!');
    }
}
