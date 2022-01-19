<?php

namespace App\Http\Middleware;

use App\Services\DebugRequestActivityLog;
use Closure;

class LogActivityMiddleware {
    private DebugRequestActivityLog $logger;

    public function __construct(DebugRequestActivityLog $logger) {
        $this->logger = $logger;
    }

    public function handle($request, Closure $next, ?string $type = null) {
        $this->logger->logRequest($request, $type ?? 'unknown type');

        return $next($request);
    }
}
