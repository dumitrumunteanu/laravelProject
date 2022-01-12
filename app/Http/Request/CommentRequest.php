<?php

namespace App\Http\Request;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest {
    public function rules(): array {
        if (Auth::check()) {
            return [
                'message' => ['required', 'string', 'min:10'],
            ];
        }
        else {
            return [
                'email' => ['required', 'string', 'email'],
                'message' => ['required', 'string', 'min:10'],
            ];
        }
    }
}
