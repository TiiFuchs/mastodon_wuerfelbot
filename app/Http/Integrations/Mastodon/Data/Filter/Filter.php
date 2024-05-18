<?php

namespace App\Http\Integrations\Mastodon\Data\Filter;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class Filter extends Data
{
    /** @var string The ID of the Filter in the database. */
    public string $id;

    /** @var string A title given by the user to name the filter. */
    public string $title;

    /** @var array<Context> The contexts in which the filter should be applied. */
    public array $context;

    /** @var CarbonImmutable When the filter should no longer be applied. */
    public CarbonImmutable $expiresAt;

    /** @var Action The action to be taken when a status matches this filter. */
    public Action $filterAction;

    /** @var array<Keyword> The keywords grouped under this filter. */
    public array $keywords;

    /** @var array<Status> The statuses grouped under this filter. */
    public array $statuses;
}
