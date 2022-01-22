<?php

namespace App\Http\Request;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest {
    public function rules(): array {
        $allowedTitle = '';
        foreach (Auth::user()->courses as $course) {
            $allowedTitle .= $course->id . ',';
        }

        return [
            'start-date' => ['required', 'date', 'date_format:Y-m-d', 'before_or_equal:end-date'],
            'start-time' => ['required', 'date_format:H:i', function($attributes, $value, $fail) {
                if ($this->get('start-date') === $this->get('end-date') && strtotime($this->get('start-time')) >= strtotime($this->get('end-time'))) {
                    return $fail('start-time should be less than end-time.');
                }
            }],
            'end-date' => ['required', 'date', 'date_format:Y-m-d', 'after_or_equal:start-date'],
            'end-time' => ['required', 'date_format:H:i', function($attributes, $value, $fail) {
                if ($this->get('start-date') === $this->get('end-date') && strtotime($this->get('start-time')) >= strtotime($this->get('end-time'))) {
                    return $fail('end-time should be greater than start-time.');
                }
            }],
            'title' => [
                'required', 'int',
                'in:' . $allowedTitle,
            ],
            'recurrence-type' => [
                'required', 'string',
                'in:once,daily,weekly,monthly',
            ],
        ];
    }
}
