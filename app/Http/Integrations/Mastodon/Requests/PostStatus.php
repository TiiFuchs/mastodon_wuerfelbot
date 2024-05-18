<?php

namespace App\Http\Integrations\Mastodon\Requests;

use App\Http\Integrations\Mastodon\Data\Status;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

class PostStatus extends Request implements HasBody
{
    use HasFormBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        protected Status $status,
    ) {
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/statuses';
    }

    protected function defaultBody(): array
    {
        return $this->status->toArray();
    }
}
