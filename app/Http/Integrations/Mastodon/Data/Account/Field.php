<?php

namespace App\Http\Integrations\Mastodon\Data\Account;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class Field extends Data
{
    /** @var string The key of a given field’s key-value pair. */
    public string $name;

    /** @var string The value associated with the name key. */
    public string $value;

    /** @var CarbonImmutable|null Timestamp of when the server verified a URL value for a rel=“me” link. */
    public ?CarbonImmutable $verifiedAt;
}
