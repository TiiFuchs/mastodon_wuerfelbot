<?php

namespace App\Http\Integrations\Mastodon\Data\Status;

use Spatie\LaravelData\Data;

class Tag extends Data
{
    /** @var string The value of the hashtag after the # sign. */
    public string $name;

    /** @var string A link to the hashtag on the instance. */
    public string $url;
}
