<?php

namespace App\Services;

use App\Models\Post;
use Auth;
use Intervention\Image\Facades\Image;
use Psr\Log\LoggerInterface;

class Creator {
    private Post $post;
    private LoggerInterface $logger;

    public function __construct(Post $post, LoggerInterface $logger) {
        $this->post = $post;
        $this->logger = $logger;
    }

    public function addPost(array $data) {
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

        $this->post->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => Auth::user()->id,
            'image' => $storeFileName,
            'published_at' => now(),
        ]);

        $this->logger->info('User ' . Auth::user()->email . ' added a new post.');
    }
}
