<?php

namespace App\Http\Integrations\Mastodon\Data\Filter;

enum Action: string
{
    case Warn = 'warn';

    case Hide = 'hide';
}
