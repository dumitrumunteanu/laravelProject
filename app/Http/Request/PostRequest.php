<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest {
    public function rules(): array {
        return [
            'title' => ['required', 'string', 'min:5', 'max:70'],
            'description' => ['required', 'string', 'min:100'],
            'image' => ['image', 'dimensions:min_width=800,min_height=200', 'max:2048'],
        ];
    }
}
