<?php

namespace App\Http\Integrations\Mastodon\Data\Report;

enum Category: string
{
    case Spam = 'spam';

    case Violation = 'violation';

    case Other = 'other';
}
