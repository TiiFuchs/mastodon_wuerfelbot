<?php

namespace App\Http\Integrations\Mastodon\Data\PreviewCard;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class PreviewCard extends Data
{
    /** @var string Location of linked resource. */
    public string $url;

    /** @var string Title of linked resource. */
    public string $title;

    /** @var string Description of preview. */
    public string $description;

    /** @var Type The type of the preview card. */
    public Type $type;

    /** @var string The author of the original resource. */
    public string $authorName;

    /** @var string A link to the author of the original resource. */
    public string $authorUrl;

    /** @var string The provider of the original resource. */
    public string $providerName;

    /** @var string A link to the provider of the original resource. */
    public string $providerUrl;

    /** @var string HTML to be used for generating the preview card. */
    public string $html;

    /** @var int Width of preview, in pixels. */
    public int $width;

    /** @var int Height of preview, in pixels. */
    public int $height;

    /** @var string|null Preview thumbnail. */
    public ?string $image;

    /** @var string Used for photo embeds, instead of custom html. */
    public string $embedUrl;

    /**
     * @var string|null A hash computed by the BlurHash algorithm, for generating colorful preview thumbnails when media has not been downloaded yet.
     *
     * @see https://github.com/woltapp/blurhash
     * */
    public ?string $blurhash;
}
