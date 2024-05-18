<?php

namespace App\Http\Integrations\Mastodon\Data\PreviewCard;

enum Type: string
{
    case Link = 'link';

    case Photo = 'photo';

    case Video = 'video';

    case Rich = 'rich';
}
