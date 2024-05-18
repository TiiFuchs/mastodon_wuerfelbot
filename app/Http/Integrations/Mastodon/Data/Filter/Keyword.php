<?php

namespace App\Http\Integrations\Mastodon\Data\Filter;

use Spatie\LaravelData\Data;

class Keyword extends Data
{
    /** @var string The ID of the FilterKeyword in the database. */
    public string $id;

    /** @var string The phrase to be matched against. */
    public string $keyword;

    /** @var bool Should the filter consider word boundaries? See implementation guidelines for filters. */
    public bool $wholeWord;
}
