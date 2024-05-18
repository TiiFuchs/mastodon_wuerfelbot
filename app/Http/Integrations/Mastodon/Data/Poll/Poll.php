<?php

namespace App\Http\Integrations\Mastodon\Data\Poll;

use App\Http\Integrations\Mastodon\Data\CustomEmoji;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapInputName(SnakeCaseMapper::class)]
class Poll extends Data
{
    /** @var string The ID of the poll in the database. */
    public string $id;

    /** @var CarbonImmutable|null When the poll ends. */
    public ?CarbonImmutable $expiresAt;

    /** @var bool Is the poll currently expired? */
    public bool $expired;

    /** @var bool Does the poll allow multiple-choice answers? */
    public bool $multiple;

    /** @var int How many votes have been received. */
    public int $votesCount;

    /** @var int|null How many unique accounts have voted on a multiple-choice poll. */
    public ?int $votersCount;

    /** @var array<Option> Possible answers for the poll. */
    public array $options;

    /** @var array<CustomEmoji> Custom emoji to be used for rendering poll options. */
    public array $emojis;

    /** @var bool|Optional When called with a user token, has the authorized user voted? */
    public bool|Optional $voted;

    /** @var array<int>|Optional */
    public array|Optional $ownVotes;
}
