<?php

namespace App\Http\Integrations\Mastodon\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class VerifyCredentials extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/apps/verify_credentials';
    }
}
