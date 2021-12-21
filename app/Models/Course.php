<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
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
}