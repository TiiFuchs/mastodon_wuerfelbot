<?php

namespace App\Http\Integrations\Mastodon\Data\Status;

enum Visibility: string
{
    case Public = 'public';

    case Unlisted = 'unlisted';

    case Private = 'private';

    case Direct = 'direct';

}
