<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements LoggableInterface
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'image',
        'published_at',
    ];

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function convertToLoggableString(): string {
        return "Article with id {$this->id}";
    }

    public function getData(): array {
        return [
            'id' => $this->id,
            'title' => $this->title,
        ];
    }
}
