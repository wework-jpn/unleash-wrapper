<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Unleash\Client\Configuration\UnleashContext;

class UnleashContextMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        $environment = app()->environment('production') ? 'production' : 'development';

        $context = new UnleashContext(
            currentUserId: $user?->uuid ?? null,
            ipAddress: $request->ip(),
            sessionId: session()->getId(),
            customContext: [
                'activeCompanyUuid' => $user?->company_uuid,
                'activeSeatMembershipType' => $user?->activeSeat?->preferred_membership_type,
                'activeSeatAdminStatus' => $user?->isAdmin,
                'wwAdminStatus' => $user?->weWorkAdmin()->first()?->status,
                'wwAdminRole' => $user?->weWorkAdmin()->first()?->type,
                'locale' => app()->getLocale(),
            ],
            hostname: $request->getHost(),
            environment: $environment,
            currentTime: now()->timestamp,
        );

        // Attach unleash context to the request
        $request->attributes->set('unleashContext', $context);

        return $next($request);
    }
}
