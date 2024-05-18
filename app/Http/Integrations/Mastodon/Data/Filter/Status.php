<?php

namespace App\Http\Integrations\Mastodon\Data\Filter;

use Spatie\LaravelData\Data;

class Status extends Data
{
    /** @var string The ID of the FilterStatus in the database. */
    public string $id;

    /** @var string The ID of the Status that will be filtered. */
    public string $statusId;
}
