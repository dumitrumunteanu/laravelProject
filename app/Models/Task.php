<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'course_id',
        'description',
        'date_due',
    ];

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function students() {
        return $this->belongsToMany(Student::class)
            ->withPivot(['submission_file_path', 'submission_date']);
    }
}
