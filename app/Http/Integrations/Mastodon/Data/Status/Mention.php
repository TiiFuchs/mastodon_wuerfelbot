<?php

namespace App\Http\Integrations\Mastodon\Data\Status;

use Spatie\LaravelData\Data;

class Mention extends Data
{
    /** @var string The account ID of the mentioned user. */
    public string $id;

    /** @var string The username of the mentioned user. */
    public string $username;

    /** @var string The location of the mentioned user’s profile. */
    public string $url;

    /** @var string The webfinger acct: URI of the mentioned user. Equivalent to username for local users, or username@domain for remote users. */
    public string $acct;
}
