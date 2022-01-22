<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'course_id',
        'start',
        'end',
        'title',
        'recurrence_type',
    ];

    protected $attributes = [
        'recurrence_type' => 'once',
    ];

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
