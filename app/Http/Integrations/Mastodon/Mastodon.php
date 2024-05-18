<?php

namespace App\Http\Integrations\Mastodon;

use App\Http\Integrations\Mastodon\Resources\StatusResource;
use App\Http\Integrations\Mastodon\Resources\StreamingResource;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

class Mastodon extends Connector
{
    use AcceptsJson;

    public function __construct(
        protected string $instanceUrl,
        #[\SensitiveParameter]
        protected string $accessToken
    ) {
        //
    }

    public function resolveBaseUrl(): string
    {
        return $this->instanceUrl('api/v1');
    }

    protected function instanceUrl(string $path = ''): string
    {
        $instanceUrl = $this->instanceUrl;

        if (! str_starts_with($instanceUrl, 'http:')) {
            $instanceUrl = 'https://'.$instanceUrl;
        }

        if (! str_ends_with($instanceUrl, '/')) {
            $instanceUrl .= '/';
        }

        return $instanceUrl.$path;
    }

    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator($this->accessToken);
    }

    public function statuses(): StatusResource
    {
        return new StatusResource($this);
    }

    public function streaming(): StreamingResource
    {
        return new StreamingResource($this);
    }
}
