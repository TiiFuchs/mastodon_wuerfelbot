<?php

namespace App\Http\Integrations\Mastodon\Resources;

use App\Http\Integrations\Mastodon\Requests\StreamUserNotifications;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class StreamingResource extends BaseResource
{
    public function userNotifications(): Response
    {
        return $this->connector->send(new StreamUserNotifications());
    }
}
