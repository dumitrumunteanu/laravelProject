<?php

namespace App\Services;

use Illuminate\Http\Request;

class DebugRequestActivityLog extends AbstractRequestActivityLogger {
    public function debugRequestData(Request $request): array {
        return [
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'content-types' => $request->getAcceptableContentTypes(),
            'ip' => $request->ip(),
            'form-data' => $request->all(),
        ];
    }
}
