<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest {
    public function rules(): array {
        return [
            'title' => ['required', 'string', 'min:5', 'max:30'],
            'date' => ['required', 'date', 'after_or_equal:today'],
            'time' => ['required', 'date_format:H:i'],
            'description' => ['required', 'string', 'min:20'],
        ];
    }
}
