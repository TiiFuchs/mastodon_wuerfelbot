<?php

namespace App\Http\Integrations\Mastodon\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class CustomEmoji extends Data
{
    /** @var string The name of the custom emoji. */
    public string $shortcode;

    /** @var string A link to the custom emoji. */
    public string $url;

    /** @var string A link to a static copy of the custom emoji. */
    public string $staticUrl;

    /** @var bool Whether this Emoji should be visible in the picker or unlisted. */
    public bool $visibleInPicker;

    /** @var string|null Used for sorting custom emoji in the picker. */
    public ?string $category;
}
