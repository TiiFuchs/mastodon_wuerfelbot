<?php

namespace App\Http\Integrations\Mastodon\Data\Filter;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class Result extends Data
{
    /** @var Filter The filter that was matched. */
    public Filter $filter;

    /** @var array<string>|null The keyword within the filter that was matched. */
    public ?array $keywordMatches;

    /** @var array<string>|null The status ID within the filter that was matched. */
    public ?array $statusMatches;
}
