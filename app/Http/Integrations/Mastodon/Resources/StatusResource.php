<?php

namespace App\Http\Integrations\Mastodon\Resources;

use App\Http\Integrations\Mastodon\Data\Status;
use App\Http\Integrations\Mastodon\Requests\PostStatus;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class StatusResource extends BaseResource
{
    public function post(Status $status): Response
    {
        return $this->connector->send(new PostStatus($status));
    }
}
