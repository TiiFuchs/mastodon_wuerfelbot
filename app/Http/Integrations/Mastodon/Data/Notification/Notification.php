<?php

namespace App\Http\Integrations\Mastodon\Data\Notification;

use App\Http\Integrations\Mastodon\Data\Account\Account;
use App\Http\Integrations\Mastodon\Data\RelationshipSeveranceEvent\RelationshipSeveranceEvent;
use App\Http\Integrations\Mastodon\Data\Report\Report;
use App\Http\Integrations\Mastodon\Data\Status\Status;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Notification extends Data
{
    /** @var string The id of the notification in the database. */
    public string $id;

    /** @var Type The type of event that resulted in the notification. */
    public Type $type;

    /** @var CarbonImmutable The timestamp of the notification. */
    public CarbonImmutable $createdAt;

    /** @var Account The account that performed the action that generated the notification. */
    public Account $account;

    /** @var Status|Optional Status that was the object of the notification. Attached when type of the notification is favourite, reblog, status, mention, poll, or update. */
    public Status|Optional $status;

    /** @var Report|Optional Report that was the object of the notification. Attached when type of the notification is admin.report. */
    public Report|Optional $report;

    /** @var RelationshipSeveranceEvent|Optional Summary of the event that caused follow relationships to be severed. Attached when type of the notification is severed_relationships. */
    public RelationshipSeveranceEvent|Optional $relationshipSeveranceEvent;
}
