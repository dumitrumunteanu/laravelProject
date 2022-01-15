<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest {
    public function rules(): array {
        return [
            'title' => ['required', 'string', 'min:5', 'max:30'],
            'image' => ['image', 'dimensions:min_width=300,min_height=150', 'max:2048'],
            'description' => ['required', 'string', 'min:20', 'max:100'],
        ];
    }
}
