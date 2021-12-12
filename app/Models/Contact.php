<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'student_id',
        'phone',
        'address_line_1',
        'address_line_2',
    ];

    protected $attributes = [
        'address_line_2' => '-',
    ];

    public function student() {
        return $this->belongsTo(Student::class);
    }
}
