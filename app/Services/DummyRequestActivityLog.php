<?php

namespace App\Services;

use Illuminate\Http\Request;

class DummyRequestActivityLog extends AbstractRequestActivityLogger {
    public function collectRequestData(Request $request): array {
        return $request->all();
    }
}
