<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Request\api\ArticleUpdateRequest;
use App\Models\Post;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\DB;

class PostApiController extends Controller {
    private $responseFactory;

    public function __construct(ResponseFactory $responseFactory) {
        $this->responseFactory = $responseFactory;
    }

    public function readMostPopularArticles() {
        $mostPopularPosts = Post::withCount('comments')->orderBy('comments_count', 'DESC')->limit(10)->get();

        return $this->responseFactory->json($mostPopularPosts);
    }

    public function update($id, ArticleUpdateRequest $request) {
        $data = $request->validated();

        $article = Post::findOrFail($id);
        if (!$article) {
            return $this->responseFactory->json(['message' => 'Not found'], 404);
        }

        if (array_key_exists('title', $data)) {
            $article->title = $data['title'];
        }
        if (array_key_exists('description', $data)) {
            $article->description = $data['description'];
        }

        $article->save();

        return $this->responseFactory->json(['message' => 'Article updated successfully', 'article' => $article], 200);
    }
}
