<?php

namespace App\Http\Integrations\Mastodon\Data\Report;

use App\Http\Integrations\Mastodon\Data\Account\Account;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class Report extends Data
{
    /** @var string The ID of the report in the database. */
    public string $id;

    /** @var bool Whether an action was taken yet. */
    public bool $actionTaken;

    /** @var ?CarbonImmutable When an action was taken against the report. */
    public ?CarbonImmutable $actionTakenAt;

    /** @var Category The generic reason for the report. */
    public Category $category;

    /** @var string The reason for the report. */
    public string $comment;

    /** @var bool Whether the report was forwarded to a remote domain. */
    public bool $forwarded;

    /** @var CarbonImmutable When the report was created. */
    public CarbonImmutable $createdAt;

    /** @var array<string>|null IDs of statuses that have been attached to this report for additional context. */
    public ?array $statusIds;

    /** @var array<string>|null IDs of the rules that have been cited as a violation by this report. */
    public ?array $ruleIds;

    /** @var Account The account that was reported. */
    public Account $account;
}
