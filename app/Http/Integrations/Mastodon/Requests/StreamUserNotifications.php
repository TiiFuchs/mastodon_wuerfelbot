<?php

namespace App\Http\Integrations\Mastodon\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class StreamUserNotifications extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return 'streaming/user/notification';
    }

    protected function defaultConfig(): array
    {
        return [
            'stream' => true,
        ];
    }
}
