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
//<option value="">Choose which department you want to contact</option>
//                            <option @if(old('department') === 'IT') selected @endif value="IT">IT</option>
//                            <option @if(old('department') === 'hr') selected @endif value="hr">Human Resources</option>
//                            <option @if(old('department') === 'marketing') selected @endif value="marketing">Marketing</option>
//                            <option @if(old('department') === 'operations') selected @endif value="operations">Operations Department</option>
//                            <option @if(old('department') === 'finance') selected @endif value="finance">Finance</option>
