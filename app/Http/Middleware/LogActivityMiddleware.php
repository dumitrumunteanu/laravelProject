<?php

namespace App\Http\Middleware;

use App\Services\RequestActivityLoggerInterface;
use Closure;

class LogActivityMiddleware {
    private RequestActivityLoggerInterface $logger;

    public function __construct(RequestActivityLoggerInterface $logger) {
        $this->logger = $logger;
    }

    public function handle($request, Closure $next, ?string $type = null) {
        $this->logger->logRequest($request, $type ?? 'unknown type');

        return $next($request);
    }
}
