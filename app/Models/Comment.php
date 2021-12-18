<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'author_email',
        'message',
        'post_id',
        'published_at',
    ];

    public function post() {
        return $this->belongsTo(Post::class);
    }
}
