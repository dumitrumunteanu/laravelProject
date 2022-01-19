<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model implements LoggableInterface
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    public function users() {
        return $this->belongsToMany(User::class, 'course_user', 'course_id', 'user_id');
    }

    public function events() {
        return $this->hasMany(Event::class);
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }

    public function convertToLoggableString(): string {
        return "course with id {$this->id}";
    }

    public function getData(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
        ];
    }


}
