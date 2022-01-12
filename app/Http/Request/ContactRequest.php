<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest {
    public function rules(): array {
        return [
            'first-name' => ['required', 'string', 'min:2'],
            'last-name' => ['required', 'string', 'min:2'],
            'email' => ['required', 'string', 'email'],
            'department' => [
                'required', 'string',
                'in:IT,hr,marketing,operations,finance'
            ],
            'message' => ['required', 'string', 'min:10'],
        ];
    }
}
