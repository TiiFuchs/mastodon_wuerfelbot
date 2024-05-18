<?php

namespace App\Http\Integrations\Mastodon\Forms;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class PollForm extends Data
{
    /** @var array<string> Possible answers to the poll. */
    public array $options;

    /** @var int Duration that the poll should be open, in seconds. */
    public int $expiresIn;

    /** @var bool Allow multiple choices? Defaults to false. */
    public bool|Optional $multiple;

    /** @var bool|Optional Hide vote counts until the poll ends? Defaults to false. */
    public bool|Optional $hideTotals;

    /**
     * @param  string[]  $options
     */
    public function __construct(array $options, int $expiresIn, ?bool $multiple = null, ?bool $hideTotals = null)
    {
        $this->options = $options;
        $this->expiresIn = $expiresIn;
        $this->multiple = $multiple ?? Optional::create();
        $this->hideTotals = $hideTotals ?? Optional::create();
    }
}
