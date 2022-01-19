<?php

namespace App\Http\Middleware;

use App\Services\DummyRequestActivityLog;
use Closure;

class LogActivityMiddleware {
    private DummyRequestActivityLog $logger;

    public function __construct(DummyRequestActivityLog $logger) {
        $this->logger = $logger;
    }

    public function handle($request, Closure $next, ?string $type = null) {
        $this->logger->logRequest($request, $type ?? 'unknown type');

        return $next($request);
    }
}
