<?php

namespace SMSkin\IdentityServiceNova3Tool\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;
use SMSkin\IdentityServiceNova3Tool\IdentityServiceNova3Tool;

class Authorize
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tool = collect(Nova::registeredTools())->first([$this, 'matchesTool']);

        return optional($tool)->authorize($request) ? $next($request) : abort(403);
    }

    /**
     * Determine whether this tool belongs to the package.
     *
     * @param Tool $tool
     * @return bool
     */
    public function matchesTool(Tool $tool): bool
    {
        return $tool instanceof IdentityServiceNova3Tool;
    }
}
