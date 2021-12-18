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

    public function users() {
        return $this->belongsToMany(User::class)
            ->withPivot(['submission_file_path', 'submission_date']);
    }
}
