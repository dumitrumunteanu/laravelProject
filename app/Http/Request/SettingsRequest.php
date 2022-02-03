<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest {
    public function rules(): array {
        return [
            'image' => [
                'required', 'image', 'max:2048',
                'dimensions:min_width=150,min_height=150,max_width=1200,max_height=1200',
            ]
        ];
    }
}
