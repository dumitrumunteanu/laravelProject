<?php

namespace App\Http\Request\api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ArticleUpdateRequest extends FormRequest {
    public function rules(): array {
        return [
            'title' => ['string', 'min:5', 'max:70'],
            'description' => ['string', 'min:100'],
        ];
    }

    public function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json([
            'message'   => 'Data is invalid',
            'data'      => $validator->errors()
        ], 400));
    }
}
