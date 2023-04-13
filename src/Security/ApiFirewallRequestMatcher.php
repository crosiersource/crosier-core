<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestMatcherInterface;

class ApiFirewallRequestMatcher implements RequestMatcherInterface
{

    public function matches(Request $request): bool
    {
        return
            $request->headers->has('Authorization') &&
            preg_match(
                '/^Bearer\s+(.*)$/i',
                $request->headers->get('Authorization'),
                $matches
            );
    }
    
}
