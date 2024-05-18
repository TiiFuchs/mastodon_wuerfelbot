<?php

namespace App\Http\Integrations\Mastodon\Data\Status;

use App\Http\Integrations\Mastodon\Data\Account\Account;
use App\Http\Integrations\Mastodon\Data\CustomEmoji;
use App\Http\Integrations\Mastodon\Data\Filter\Result;
use App\Http\Integrations\Mastodon\Data\Poll\Poll;
use App\Http\Integrations\Mastodon\Data\PreviewCard\PreviewCard;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapInputName(SnakeCaseMapper::class)]
class Status extends Data
{
    /** @var string ID of the status in the database. */
    public string $id;

    /** @var string URI of the status used for federation. */
    public string $uri;

    /** @var CarbonImmutable The date when this status was created. */
    public CarbonImmutable $createdAt;

    /** @var Account The account that authored this status. */
    public Account $account;

    /** @var string HTML-encoded status content. */
    public string $content;

    /** @var Visibility Visibility of this status. */
    public Visibility $visibility;

    /** @var bool Is this status marked as sensitive content? */
    public bool $sensitive;

    /** @var string Subject or summary line, below which status content is collapsed until expanded. */
    public string $spoilerText;

    /** @var array Media that is attached to this status. */
    public array $mediaAttachments;

    /** @var array<Mention> Mentions of users within the status content. */
    public array $mentions;

    /** @var array<Tag> Hashtags used within the status content. */
    public array $tags;

    /** @var array<CustomEmoji> Custom emoji to be used when rendering status content. */
    public array $emojis;

    /** @var int How many boosts this status has received. */
    public int $reblogsCount;

    /** @var int How many favourites this status has received. */
    public int $favouritesCount;

    /** @var int How many replies this status has received. */
    public int $repliesCount;

    /** @var string|null A link to the status’s HTML representation. */
    public ?string $url;

    /** @var string|null ID of the status being replied to. */
    public ?string $inReplyToId;

    /** @var string|null ID of the account that authored the status being replied to. */
    public ?string $inReplyToAccountId;

    /** @var Status|null The status being reblogged. */
    public ?Status $reblog;

    /** @var array<Poll>|null The poll attached to the status. */
    public ?array $poll;

    /** @var PreviewCard|null Preview card for links included within status content. */
    public ?PreviewCard $card;

    /** @var string|null Primary language of this status. */
    public ?string $language;

    /** @var string|null Plain-text source of a status. Returned instead of content when status is deleted, so the user may redraft from the source text without the client having to reverse-engineer the original text from the HTML content. */
    public ?string $text;

    /** @var CarbonImmutable|null Timestamp of when the status was last edited. */
    public ?CarbonImmutable $editedAt;

    /** @var bool|Optional If the current token has an authorized user: Have you favourited this status? */
    public bool|Optional $favourited;

    /** @var bool|Optional If the current token has an authorized user: Have you boosted this status? */
    public bool|Optional $reblogged;

    /** @var bool|Optional If the current token has an authorized user: Have you muted notifications for this status’s conversation? */
    public bool|Optional $muted;

    /** @var bool|Optional If the current token has an authorized user: Have you bookmarked this status? */
    public bool|Optional $bookmarked;

    /** @var bool|Optional If the current token has an authorized user: Have you pinned this status? Only appears if the status is pinnable. */
    public bool|Optional $pinned;

    /** @var array<Result>|Optional If the current token has an authorized user: The filter and keywords that matched this status. */
    public array|Optional $filtered;
}
