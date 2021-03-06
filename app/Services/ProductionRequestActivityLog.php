<?php

namespace App\Services;

use Illuminate\Http\Request;

class ProductionRequestActivityLog extends AbstractRequestActivityLogger {
    public function debugRequestData(Request $request): array {
        return [
            'ip' => $request->ip(),
            'url' => $request->fullUrl(),
        ];
    }
}
