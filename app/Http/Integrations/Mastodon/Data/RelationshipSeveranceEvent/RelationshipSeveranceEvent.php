<?php

namespace App\Http\Integrations\Mastodon\Data\RelationshipSeveranceEvent;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapInputName(SnakeCaseMapper::class)]
class RelationshipSeveranceEvent extends Data
{
    /** @var string The ID of the relationship severance event in the database. */
    public string $id;

    /** @var Type Type of event. */
    public Type $type;

    /** @var bool Whether the list of severed relationships is unavailable because the underlying issue has been purged. */
    public bool $purged;

    /** @var string Name of the target of the moderation/block event. This is either a domain name or a user handle, depending on the event type. */
    public string $targetName;

    /** @var int|Optional Number of follow relationships (in either direction) that were severed. */
    public int|Optional $relationshipsCount;

    /** @var CarbonImmutable When the event took place. */
    public CarbonImmutable $createdAt;
}
