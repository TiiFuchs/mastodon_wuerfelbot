<?php

namespace App\Http\Integrations\Mastodon\Data\Account;

use App\Http\Integrations\Mastodon\Data\CustomEmoji;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapInputName(SnakeCaseMapper::class)]
class Account extends Data
{
    /** @var string The account id. */
    public string $id;

    /** @var string The username of the account, not including domain. */
    public string $username;

    /** @var string The Webfinger account URI. Equal to username for local users, or username@domain for remote users. */
    public string $acct;

    /** @var string The location of the user’s profile page. */
    public string $url;

    /** @var string The profile’s display name. */
    public string $displayName;

    /** @var string The profile’s bio or description. */
    public string $note;

    /** @var string An image icon that is shown next to statuses and in the profile. */
    public string $avatar;

    /** @var string A static version of the avatar. Equal to avatar if its value is a static image; different if avatar is an animated GIF. */
    public string $avatarStatic;

    /** @var string An image banner that is shown above the profile and in profile cards. */
    public string $header;

    /** @var string A static version of the header. Equal to header if its value is a static image; different if header is an animated GIF. */
    public string $headerStatic;

    /** @var bool Whether the account manually approves follow requests. */
    public bool $locked;

    /** @var array<Field> Additional metadata attached to a profile as name-value pairs. */
    public array $fields;

    /** @var array<CustomEmoji> Custom emoji entities to be used when rendering the profile. */
    public array $emojis;

    /** @var bool Indicates that the account may perform automated actions, may not be monitored, or identifies as a robot. */
    public bool $bot;

    /** @var bool Indicates that the account represents a Group actor. */
    public bool $group;

    /** @var bool|null Whether the account has opted into discovery features such as the profile directory. */
    public ?bool $discoverable;

    /** @var bool|Optional|null Whether the local user has opted out of being indexed by search engines. */
    public bool|Optional|null $noindex;

    /** @var Account|Optional|null Indicates that the profile is currently inactive and that its user has moved to a new account. */
    public Account|Optional|null $moved;

    /** @var bool|Optional An extra attribute returned only when an account is suspended. */
    public bool|Optional $suspended;

    /** @var bool|Optional An extra attribute returned only when an account is silenced. If true, indicates that the account should be hidden behind a warning screen. */
    public bool|Optional $limited;

    /** @var CarbonImmutable When the account was created. */
    public CarbonImmutable $createdAt;

    /** @var CarbonImmutable|null When the most recent status was posted. */
    public ?CarbonImmutable $lastStatusAt;

    /** @var int How many statuses are attached to this account. */
    public int $statusesCount;

    /** @var int The reported followers of this profile. */
    public int $followersCount;

    /** @var int The reported follows of this profile. */
    public int $followingCount;
}
