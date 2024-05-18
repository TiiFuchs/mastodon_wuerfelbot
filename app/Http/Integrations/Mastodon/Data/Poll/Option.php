<?php

namespace App\Http\Integrations\Mastodon\Data\Poll;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class Option extends Data
{
    /** @var string The text value of the poll option. */
    public string $title;

    /** @var int|null The total number of received votes for this option. */
    public ?int $votesCount;
}
