<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'teacher_id',
        'course_title',
    ];

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }

    public function students() {
        return $this->belongsToMany(Student::class);
    }

    public function events() {
        return $this->hasMany(Event::class);
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
