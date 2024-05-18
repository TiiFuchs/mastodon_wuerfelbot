<?php

namespace App\Http\Integrations\Mastodon\Forms;

use App\Http\Integrations\Mastodon\Data\Status\Visibility;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class StatusForm extends Data
{
    /** @var string The text content of the status. If media_ids is provided, this becomes optional. Attaching a poll is optional while status is provided. */
    public string|Optional $status;

    /** @var array<string> Include Attachment IDs to be attached as media. If provided, status becomes optional, and poll cannot be used. */
    public array|Optional $mediaIds;

    /** @var PollForm If media_ids is provided, this becomes optional. Attaching a poll is optional while status is provided. */
    public PollForm|Optional $poll;

    /** @var string|Optional ID of the status being replied to, if status is a reply. */
    public string|Optional $inReplyToId;

    /** @var bool|Optional Mark status and attached media as sensitive? Defaults to false. */
    public bool|Optional $sensitive;

    /** @var string|Optional Text to be shown as a warning or subject before the actual content. Statuses are generally collapsed behind this field. */
    public string|Optional $spoilerText;

    /** @var Visibility|Optional Sets the visibility of the posted status to public, unlisted, private, direct. */
    public Visibility|Optional $visibility;

    /** @var string|Optional ISO 639 language code for this status. */
    public string|Optional $language;

    /** @var CarbonImmutable|Optional ISO 8601 Datetime at which to schedule a status. Providing this parameter will cause ScheduledStatus to be returned instead of Status. Must be at least 5 minutes in the future. */
    public CarbonImmutable|Optional $scheduledAt;

    /**
     * @param  Optional|string[]  $mediaIds
     */
    public function __construct(
        ?string $status = null,
        ?array $mediaIds = null,
        ?PollForm $poll = null,
        ?string $inReplyToId = null,
        ?bool $sensitive = null,
        ?string $spoilerText = null,
        ?Visibility $visibility = null,
        ?string $language = null,
        ?CarbonImmutable $scheduledAt = null,
    ) {
        $this->status = $status ?? Optional::create();
        $this->mediaIds = $mediaIds ?? Optional::create();
        $this->poll = $poll ?? Optional::create();
        $this->inReplyToId = $inReplyToId ?? Optional::create();
        $this->sensitive = $sensitive ?? Optional::create();
        $this->spoilerText = $spoilerText ?? Optional::create();
        $this->visibility = $visibility ?? Optional::create();
        $this->language = $language ?? Optional::create();
        $this->scheduledAt = $scheduledAt ?? Optional::create();
    }
}
