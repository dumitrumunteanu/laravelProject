<?php

namespace App\Services;

use Illuminate\Http\Request;

class DebugRequestActivityLog extends AbstractRequestActivityLogger {
    public function debugRequestData(Request $request): array {
        return [
            'ip' => $request->ip(),
            'form-data' => $request->all(),
        ];
    }
}
